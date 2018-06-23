<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use App\Http\Controllers\CrudHelper\ControllerUtils;
use Illuminate\Http\Request;
use App\Model\Game;
use App\Model\Company;
use App\Model\Category;
use App\Model\GameType;
use App\Model\Plataform;
use Illuminate\Support\Facades\Validator;
use Session;

class GameController extends ControllerCrud
{
    public function addCart(Request $request, $id)
    {
        $game = Game::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($game, $game->id);

        $request->session()->put('cart',$cart);
        dd($request->session()->get('cart'));
        return redirect()->route('dashboard');

    }
    public function index()
    {
        $companies = Company::all();
        $game_types = GameType::all();
        $categories = Category::all();
        $plataforms = Plataform::all();
        return view('sections.config.games')->with(['companies' => $companies ,'game_types' => $game_types,'categories' => $categories, 'plataforms' => $plataforms]);
    }

    public function store(Request $request)
    {
        //dd($request->file('cover')->store('public/cover'));
        $rules = [
            'name' => 'required',
            'companies_id' => 'required',
            'categories_id' => 'required',
            'description' => 'required',
            'game_types_id' => 'required',
            'plataforms_id' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1'
        ];

        $messages = [
            'name.required' => 'El nombre del juego es obligatorio',
            'price.required' => 'El precio es obligatirio',
            'plataforms_id.required' => 'El campo plataforma es obligatirio',
            'price.numeric' => 'El precio debe ser numérico',
            'game_types_id.required' => 'El tipo de Juego es obligatirio',
            'companies_id.required' => 'La compañia del Juego es obligatirio',
            'categories_id.required' => 'La categoria del Juego es obligatirio',
            'price.min' => 'El valor del precio debe ser mayor a $1',
            'description.required' => 'La descripción es requerida',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $game =  new Game();

            $game->name = $request->name;
            /*if ($request->hasFile('cover')) {
                $game->cover = $request->file('cover')->store('public/cover');
            }*/
            $game->cover = $request->file('cover')->store('public/cover');
            $game->link = $request->web;
            $game->price = $request->price;
            $game->stock = $request->stock;
            $game->plataforms_id = $request->plataforms_id;
            $game->categories_id = $request->categories_id;
            $game->game_types_id = $request->game_types_id;
            $game->companies_id = $request->companies_id;
            $game->description = $request->description;
            $game->save();

            if ($game) {
                return ControllerUtils::successResponseJson($game->name, "Registro creado correctamente.");
            }
            return ControllerUtils::errorResponseJson('No se ha podido realizar el registro.');
        }
        return ControllerUtils::errorResponseValidation($validator);
    }


    public function update(Request $request)
    {
        //dd($request->file('cover')->store('public/cover'));
        //dd($request);
        $rules = [
            'name' => 'required',
            'companies_id' => 'required',
            'categories_id' => 'required',
            'description' => 'required',
            'game_types_id' => 'required',
            'plataforms_id' => 'required',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|numeric|min:1'
        ];

        $messages = [
            'name.required' => 'El nombre del juego es obligatorio',
            'price.required' => 'El precio es obligatirio',
            'plataforms_id.required' => 'El campo plataforma es obligatirio',
            'price.numeric' => 'El precio debe ser numérico',
            'game_types_id.required' => 'El tipo de Juego es obligatirio',
            'companies_id.required' => 'La compañia del Juego es obligatirio',
            'categories_id.required' => 'La categoria del Juego es obligatirio',
            'price.min' => 'El valor del precio debe ser mayor a $1',
            'description.required' => 'La descripción es requerida',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            $game = Game::where('id','=',$request->id)->first();
            if ($request->hasFile('cover')) {
                $game->cover = $request->file('cover')->store('public/cover');
            }
            $game->price = $request->price;
            $game->stock = $request->stock;
            $game->link = $request->web;
            $game->plataforms_id = $request->plataforms_id;
            $game->categories_id = $request->categories_id;
            $game->game_types_id = $request->game_types_id;
            $game->companies_id = $request->companies_id;
            $game->description = $request->description;
            $game->save();

            if($game){
                return ControllerUtils::successResponseJson($game, "Registro actualizado correctamente.");
            }
            return ControllerUtils::errorResponseJson('No se ha podido actualizar el registro.');
        }
        return ControllerUtils::errorResponseValidation($validator);

    }

    public function __construct()
    {
        parent::__construct(Game::class);

    }



}
