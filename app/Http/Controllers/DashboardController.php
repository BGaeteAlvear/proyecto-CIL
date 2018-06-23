<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Plataform;
use App\Model\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
class DashboardController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function index()
    {
        return $this->delegate();
    }

    public function delegate()
    {
        if (Auth::check()) {
//            $user = User::where('email', Auth::user()->email)->with('role')->first();
            $user = Auth::user()->load('role');

            switch ($user->role->name) {
                case 'Administrador':
                    return $this->renderAdminDashboard();
                case 'Cajero':
                    return $this->renderCajeroDashboard();
                case 'Cliente':
                    return $this->renderClienteDashboard();
                default:
                    return 'Error Grave de Autentificación, contácte con un administador';
            }
        }

        return redirect('/');
    }

    private function renderAdminDashboard()
    {
        $nodes_unassigned = Game::get()->count();
        $nodes_suggested = Game::sum('stock');
        $nodes_in_review = Plataform::get()->count();
        $total_nodes = Game::get()->count();
        $constructores = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.name','LIKE','Cliente')
            ->get()->count();

        return view('dashboard.admin')->with([
            'total_nodes' => $total_nodes,
            'nodes_unassigned' => $nodes_unassigned,
            'nodes_suggested' => $nodes_suggested,
            'nodes_in_review' => $nodes_in_review,
            'constructores' => $constructores
        ]);
        //return view('dashboard.admin');

    }

    private function renderCajeroDashboard()
    {
        return view('dashboard.cajero');
    }

    private function renderClienteDashboard()
    {

        $cart = Cart::instance('shopping')->content();
        $total = Cart::total(0, ',', '.');;
        $plataforms = Plataform::all();
        $games = Game::all();

        //return response()->json($cart);
        return view('dashboard.cliente')->with('plataforms', $plataforms)->with('games', $games)->with('cart', $cart)->with('total', $total);
    }

    public function getAsignVsAprob(){


    $data = DB::table('users')
        ->select('users.id',
            DB::raw("CONCAT_WS(' ',users.firstname, users.lastname) fullname"),
            DB::raw("(select count(*) from nodes where nodes.user_id = users.id and (nodes.node_status_id <> 'APROB' or nodes.node_status_id <> 'PUBLI')) nodos_assigned"),
            DB::raw("(select count(*) from nodes where nodes.user_id = users.id and (nodes.node_status_id like 'APROB' or nodes.node_status_id like 'PUBLI')) nodes_aproved"))
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.name','LIKE','Constructor')
        ->get();

    return response()->json($data);
    }

    public function getNodesStatuses(){

        $data = DB::table('games')
            ->select( '*',DB::raw("(select count(stock) from games ) count"))
            ->get();

        return response()->json($data);
    }

}
