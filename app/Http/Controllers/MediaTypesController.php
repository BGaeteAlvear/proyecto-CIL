<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use App\Model\MediaType;

class MediaTypesController extends ControllerCrud
{
    public function __construct()
    {
        parent::__construct(MediaType::class);
        parent::setIndexPage('sections.config.media-types');
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
