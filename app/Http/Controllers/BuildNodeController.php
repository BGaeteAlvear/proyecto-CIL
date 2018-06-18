<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerUtils;
use App\Model\BuildNodeSubcategory;
use App\Model\BuildNodeTypeObjetive;
use App\Model\NodeConcretism;
use App\Model\NodeStatus;
use App\Model\NodeTypeGeneralObjetive;
use App\Model\NodeTypeLearningObjetive;
use App\Model\Node;
use App\Model\NodeCategory;
use App\Model\NodeSubcategory;
use App\Model\Relation;
use App\Model\SuggestedNode;
use App\Model\NodeType;
use App\Model\Feedback;
use App\Model\ClassLesson;
use App\Model\NodeStudyArea;
use App\Model\ClassLessonLearningObjetive;
use App\Model\Vertex;
use App\Model\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\URLMedia;

class BuildNodeController extends Controller
{
    public function index()
    {

        $nodes = Node::where('active', '=', 1)
            ->where('node_status_id', '<>', 'NOASI')
            ->where('node_status_id', '<>', 'APROB')
            ->where('node_status_id', '<>', 'PUBLI')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('sections.build-node.index')->with(['nodes' => $nodes]);
    }

    public function build($id)
    {

      //return  Storage::disk('s3')->url('stCzppVFEvZBXfpxrhF2A40Y3e6x3JWmPQeXie3o.png');

        $node = Node::with([
            'user',
            'node_status',
            'node_concretism',
            'node_study_area',
            'node_category',
            'node_type',
            'build_node_subcategories',
            'build_node_type_objetives.media',
            'relations.has_vertex',
            'relations.to_node'

        ])->findOrFail(decrypt($id));

        if ($node->node_status_id == 'ENREV') {
            return redirect()->route('build-node');
        }

        if ($node->node_status_id == 'ASIGN') {
            $node->node_status_id = 'ENCON';
            $node->save();
        }

        if ($node->node_status_id == 'RECHA') {
            $node->node_status_id = 'ENREC';
            $node->save();
        }

        $feedback = Feedback::with(['constructor','validator.role'])->where('to_user_id', '=', Auth::user()->id)->where('node_id', '=', $node->id)->get();
        $nodeCategories = NodeCategory::where('active', '=', 1)->get();
        $nodeSubCategories = NodeSubCategory::where('active', '=', 1)->get();
        $nodeTypes = NodeType::where('active', '=', 1)->get();
        $nodeStudyAreas = NodeStudyArea::where('active', '=', 1)->get();
        $nodeConcretisms = NodeConcretism::where('active', '=', 1)->get();
        $nodeTypeLearningObjetives = NodeTypeLearningObjetive::where('active', '=', 1)->with('class_lesson_learning_objetive.class_lesson')->get();
        $nodeTypeGeneralObjetives = NodeTypeGeneralObjetive::where('active', '=', 1)->get();
        $classLessonLearningObjetive = ClassLessonLearningObjetive::all();
        $relations = Relation::where('from_node_id', '=', $node->id)->get();
        //
        //return response()->json($media);
        $vertices = Vertex::orderBy('name')->where('active', '=', 1)->get();
        $nodes = Node::select('id','name')->where('active', '=', 1)->orderBy('name')->get();

        return view('sections.build-node.build')->with([
            'node' => $node,
            'relations' => $node->id,
            'nodeCategories' => $nodeCategories,
            'nodeSubCategories' => $nodeSubCategories,
            'nodeTypes' => $nodeTypes,
            'nodeStudyAreas' => $nodeStudyAreas,
            'nodeConcretisms' => $nodeConcretisms,
            'nodeTypeLearningObjetives' => $nodeTypeLearningObjetives,
            'nodeTypeGeneralObjetives' => $nodeTypeGeneralObjetives,
            'feedback' => $feedback,
            'vertices' => $vertices,
            'nodes' => $nodes,
            'classLessonLearningObjetives' => $classLessonLearningObjetive,
        ]);
    }

    public function create(Request $request)
    {
        //return $request->all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        //return $request->all();
        try {

            $node = Node::findOrFail($request->node_id);

            $this->deleteByChangedCategory($node, $request->node_category_id);
            $this->deleteByChangedNodeType($node, $request->node_type_id);
            $this->deleteByRelations($node);

            $node->node_category_id = $request->node_category_id;
            $node->node_concretism_id = $request->node_concretism_id;
            $node->node_study_area_id = $request->node_study_area_id;
            $node->node_type_id = $request->node_type_id;

            //return response()->json($node);
            if ($request->node_subcategories) {

                foreach ($request->node_subcategories as $node_subcategory) {
                    $this->insertSubcategory($node->id, $node->node_category_id, $node_subcategory);
                }
            }

            if ($request->node_type_objetives) {

                //return $request->node_type_objetives['1']['media']['animation']['0'];
                foreach ($request->node_type_objetives as $node_type_objetive) {
                    $this->insertNodeTypeObjetive($node->id, $node->node_type_id, $node_type_objetive,$request->node_type_objetives, $node->id_official);
                }

            }
            //METODO PARA RECIBIR LAS RELACIONES
            if ($request->relations) {
                foreach ($request->relations as $relation) {
                    $this->insertRelation($node->id, $relation['vertice_id'], $relation['node_id']);
                }
            }
            $node->save();
            return back();

        } catch (\Exception $e) {

        }

    }

    private function insertSubcategory($node_id, $node_category_id, $node_subcategory)
    {

        try {
            $buildNodeSubcategory = BuildNodeSubcategory::where('node_id', '=', $node_id)
                ->where('node_subcategory_id', '=', $node_subcategory['id'])
                ->first();

            if ($buildNodeSubcategory) {

                $buildNodeSubcategory->type = $node_subcategory['type'] ? $node_subcategory['type'] : null;
                $buildNodeSubcategory->extra_values = isset($node_subcategory['extra_values']) ? $node_subcategory['extra_values'] : null;

                if($node_subcategory['type'] == 'date'){
                    $buildNodeSubcategory->definition = $this->setEspecialDate($node_subcategory['definition']);
                }else{
                    $buildNodeSubcategory->definition = $node_subcategory['definition'] ? $node_subcategory['definition'] : null;
                }

                $buildNodeSubcategory->save();

            } else {

                $buildNodeSubcategory = new BuildNodeSubcategory();

                $buildNodeSubcategory->node_id = $node_id;
                $buildNodeSubcategory->node_category_id = $node_category_id;
                $buildNodeSubcategory->node_subcategory_id = $node_subcategory['id'];

                $buildNodeSubcategory->type = $node_subcategory['type'] ? $node_subcategory['type'] : null;
                $buildNodeSubcategory->extra_values = isset($node_subcategory['extra_values']) ? $node_subcategory['extra_values'] : null;

                if($node_subcategory['type'] == 'date'){
                    $buildNodeSubcategory->definition = $this->setEspecialDate($node_subcategory['definition']);
                }else{
                    $buildNodeSubcategory->definition = $node_subcategory['definition'] ? $node_subcategory['definition'] : null;
                }

                $buildNodeSubcategory->save();
            }

        } catch (\Exception $e) {

        }
    }

    private function setEspecialDate($date){

        $day = $date['day'] ? $date['day']: 'D';
        $month = $date['month'] ? $date['month']: 'M';
        $year = $date['year'] ? $date['year']: 'Y';
        $dateString =   $day .'/'.$month.'/'.$year;

        return $dateString;
    }

    private function insertNodeTypeObjetive($node_id, $node_type_id, $node_type_objetive, $node_type_objetives, $id_official)
    {

        try {
            $buildNodeTypeObjetive = BuildNodeTypeObjetive::where('node_type_id', '=', $node_type_id)
                ->where('node_id', '=', $node_id)
                ->where('node_type_learning_objetive_id', '=', $node_type_objetive['id'])
                ->OrWhere('node_type_general_objetive_id', '=', $node_type_objetive['id'])
                ->first();

            if ($buildNodeTypeObjetive) {

                if ($node_type_id == 1) {
                    $buildNodeTypeObjetive->node_type_learning_objetive_id = $node_type_objetive['id'];
                } elseif ($node_type_id == 2) {
                    $buildNodeTypeObjetive->node_type_general_objetive_id = $node_type_objetive['id'];
                }

                if (isset($node_type_objetive['levels']) && !is_null($node_type_objetive['levels'])) {

                    $buildNodeTypeObjetive->levels = json_encode(array_map('intval', $node_type_objetive['levels']));
                } else {
                    $buildNodeTypeObjetive->levels = null;
                }

                if (isset($node_type_objetive['class_lesson_id']) && !is_null($node_type_objetive['class_lesson_id'])) {
                    $buildNodeTypeObjetive->class_lessons_id = $node_type_objetive['class_lesson_id'];
                } else {
                    $buildNodeTypeObjetive->class_lessons_id = null;
                }

                $buildNodeTypeObjetive->definition = $node_type_objetive['definition'];
                //dd($buildNodeTypeObjetive);
                $buildNodeTypeObjetive->save();

                /// guardar archivos medias
                foreach ($node_type_objetives as $value) {
                    if($value['id']==$node_type_objetive['id']){

                        if (isset($value['media']['animation'])) {
                            foreach ($value['media']['animation'] as $file) {
                                $this->createAnimation($file, $id_official, $buildNodeTypeObjetive);
                            }
                        }


                        if (isset($value['media']['image'])) {
                            foreach ($value['media']['image'] as $file) {
                                $this->createImage($file, $id_official, $buildNodeTypeObjetive->id);
                            }
                        }


                        if (isset($value['media']['video'])) {
                            foreach ($value['media']['video'] as $file) {
                                $this->createVideo($file, $id_official, $buildNodeTypeObjetive->id);
                            }
                        }


                        if (isset($value['media']['audio'])) {
                            foreach ($value['media']['audio'] as $file) {
                                $this->createAudio($file, $id_official, $buildNodeTypeObjetive->id);
                            }
                        }

                        if (isset($value['media']['link'])) {
                            foreach ($value['media']['link'] as $file) {
                                $this->createLink($file['url'], $buildNodeTypeObjetive->id, $file['description']);
                            }
                        }
                    }
                }

            } else {

                $buildNodeTypeObjetive = new BuildNodeTypeObjetive();
                $buildNodeTypeObjetive->node_id = $node_id;
                $buildNodeTypeObjetive->node_type_id = $node_type_id;

                if ($node_type_id == 1) {
                    $buildNodeTypeObjetive->node_type_learning_objetive_id = $node_type_objetive['id'];
                } elseif ($node_type_id == 2) {
                    $buildNodeTypeObjetive->node_type_general_objetive_id = $node_type_objetive['id'];
                }

                if (isset($node_type_objetive['levels']) && !is_null($node_type_objetive['levels'])) {
                    $buildNodeTypeObjetive->levels = json_encode(array_map('intval', $node_type_objetive['levels']));
                } else {
                    $buildNodeTypeObjetive->levels = null;
                }
                //dd($node_type_objetive['class_lesson_id']);
                if (isset($node_type_objetive['class_lesson_id']) && !is_null($node_type_objetive['class_lesson_id'])) {
                    $buildNodeTypeObjetive->class_lessons_id = $node_type_objetive['class_lesson_id'];
                } else {
                    $buildNodeTypeObjetive->class_lessons_id = null;
                }
                $buildNodeTypeObjetive->definition = $node_type_objetive['definition'];

                //dd($buildNodeTypeObjetive);
                $buildNodeTypeObjetive->save();

                foreach ($node_type_objetives as $value) {

                    if($value['id']==$node_type_objetive['id']){
                        if (isset($value['media']['animation'])) {
                            foreach ($value['media']['animation'] as $file) {
                                $this->createAnimation($file, $id_official, $buildNodeTypeObjetive);
                            }
                        }


                        if (isset($value['media']['image'])) {
                            foreach ($value['media']['image'] as $file) {
                                $this->createImage($file, $id_official, $buildNodeTypeObjetive->id);
                            }
                        }


                        if (isset($value['media']['video'])) {
//                            dd($value['media']['video']);
                            foreach ($value['media']['video'] as $file) {
                                $this->createVideo($file, $id_official, $buildNodeTypeObjetive->id);
                            }
                        }


                        if (isset($value['media']['audio'])) {
                            foreach ($value['media']['audio'] as $file) {
                                $this->createAudio($file, $id_official, $buildNodeTypeObjetive->id);
                            }
                        }

                        if (isset($value['media']['link'])) {
//                            dd($value['media']['link']);
                            foreach ($value['media']['link'] as $file) {
                                $this->createLink($file['url'], $buildNodeTypeObjetive->id, $file['description']);
                            }
                        }
                    }

                }
            }
        } catch (\Exception $e) {
            //
        }

    }

    private function deleteByChangedCategory($node, $node_category_id)
    {
        if ($node_category_id) {
            if ($node->node_category_id != $node_category_id) {
                DB::table('build_node_subcategories')->where('node_id', '=', $node->id)
                    ->where('node_category_id', '!=', $node_category_id)->delete();
            }
        }

    }

    private function deleteByChangedNodeType($node, $node_type_id)
    {
        if ($node_type_id) {
            if ($node->node_type_id != $node_type_id) {
                DB::table('build_node_type_objetives')->where('node_id', '=', $node->id)
                    ->where('node_type_id', '!=', $node_type_id)->delete();
            }
        }

    }

    public function sendToRevision(Request $request)
    {
//        return $request->all();
        $node = Node::where('id', '=', $request->id)->first();
        if ($node) {
            $node->node_status_id = 'ENREV';
            $node->save();
            return redirect()->route('build-node');
        }

    }

    public function storeSuggested(Request $request)
    {
        //return response()->json($request);
        $node = Node::where('name', '=', $request->name)->exists();
        if (!$node) {
            $suggestedNodeSearch = SuggestedNode::where('name', '=', $request->name)->exists();
            if (!$suggestedNodeSearch) {
                $suggestedNode = new SuggestedNode();
                $suggestedNode->name = $request->name;
                $suggestedNode->user_id = $request->user_id;
                $suggestedNode->status = 'ENREV';
                $suggestedNode->save();
                return ControllerUtils::successResponseJson($suggestedNode->name, "Sugerencia de nodo agregada correctamente.");
            } else {
                return ControllerUtils::errorResponseJson('El nodo sugerido ya se encuentra dentro del listado las sugerencias.');
            }
        } else {
            return ControllerUtils::errorResponseJson('El nodo sugerido ya se encuentra registrado!.');
        }
    }


    public function mediaDestroy(Request $request)
    {

        $element = Media::where('id','=',$request->id)->first();
        //return $element;
        if ($element) {
            Storage::disk('s3')->delete($element->storage);
            $element->delete();
            return ControllerUtils::successResponseJson('Se ha eliminado correctamente el elemento');
        }else{
            return ControllerUtils::errorResponseJson('Elemento no encontrado en la base de datos');
        }

    }

    private function insertRelation($from_node_id, $has_vertex_id, $to_node_id)
    {
        try {
            $relation = new Relation();
            $relation->from_node_id = $from_node_id;
            $relation->has_vertex_id = $has_vertex_id;
            $relation->to_node_id = $to_node_id;
            $relation->save();

        } catch (\Exception $e) {
        }

    }

    private function deleteByRelations($node)
    {
        if ($node) {
            DB::table('relations')->where('from_node_id', '=', $node->id)->delete();
        }
    }

    private function createAnimation($file, $id_official, $buildNodeTypeObjetive)
    {
        if ($file) {
            if ($buildNodeTypeObjetive->id) {
                $media = new Media();
                $media->build_node_type_objetives_id =$buildNodeTypeObjetive->id;
                $media->media_type_id = 4;
                $media->storage = Storage::disk('s3')->put(URLMedia::generateUrl($id_official,$buildNodeTypeObjetive,4), $file, 'public-read');
                $media->save();
            }
        }
    }

    private function createImage($file, $id_official, $node_type_objetive_id)
    {
        if ($file) {
            if ($node_type_objetive_id) {
                $media = new Media();
                $media->build_node_type_objetives_id = $node_type_objetive_id;
                $media->media_type_id = 1;
                $media->storage = $file->store('/public/media/'.$id_official.'/image/'.$node_type_objetive_id, 's3', 'public');
                $media->save();
            }
        }
    }


    private function createAudio($file, $id_official, $node_type_objetive_id)
    {
        if ($file) {
            if ($node_type_objetive_id) {
                $media = new Media();
                $media->build_node_type_objetives_id = $node_type_objetive_id;
                $media->media_type_id = 2;
                $media->storage = $file->store('/public/media/'.$id_official.'/audio/'.$node_type_objetive_id, 's3', 'public');
                $media->save();
            }
        }
    }

    private function createVideo($file, $id_official, $node_type_objetive_id)
    {
        if ($file) {
            if ($node_type_objetive_id) {
                $media = new Media();
                $media->build_node_type_objetives_id = $node_type_objetive_id;
                $media->media_type_id = 3;
                $media->storage = $file->store('/public/media/'.$id_official.'/video/'.$node_type_objetive_id, 's3', 'public');
                $media->save();
            }
        }
    }

    private function createLink($url, $node_type_objetive_id, $description)
    {
        if ($url) {
            if ($node_type_objetive_id) {
                $media = new Media();
                $media->build_node_type_objetives_id = $node_type_objetive_id;
                $media->media_type_id = 5;
                $media->url =$url;
                $media->description =$description;
                $media->save();
            }
        }
    }

}
