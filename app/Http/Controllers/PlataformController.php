<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use App\Model\Plataform;

class PlataformController extends ControllerCrud
{
    public function __construct()
    {
        parent::__construct(Plataform::class);
        parent::setIndexPage('sections.config.plataforms');
        //validate store
        parent::setValidationStore([
            'name' => 'required|max:50|min:1'
        ]);
        //validate update
        parent::setValidationUpdate([
            'name' => 'required|max:50|min:1'
        ]);
    }

}
