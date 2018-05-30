<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use Illuminate\Http\Request;
use App\Model\Game;
use App\Model\Company;

class GameController extends ControllerCrud
{
    public function index()
    {
        $companies = Company::all();
        return view('sections.config.games')->with(['companies' => $companies]);
    }


    public function __construct()
    {
        parent::__construct(Game::class);
        $companies = Company::all();
        parent::setIndexPage('');
        //validate store
        parent::setValidationStore([
            'name' => 'required|max:50|min:1',
            'clasification' => 'required|max:50|min:1',
            'description' => 'required|max:50|min:1',
            'link' => 'url',
            'price' => 'required|numeric|max:50|min:1',
            'stock' => 'required|numeric|max:50|min:1',
        ]);
        //validate update
        parent::setValidationUpdate([
            'name' => 'required|max:50|min:1',
            'clasification' => 'required|max:50|min:1',
            'description' => 'required|max:50|min:1',
            'link' => 'url',
            'price' => 'required|numeric|max:50|min:1',
            'stock' => 'required|numeric|max:50|min:1',
        ]);
    }



}
