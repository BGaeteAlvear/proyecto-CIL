<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use App\Model\Category;

class CategoryController extends ControllerCrud
{
    public function __construct()
    {
        parent::__construct(Category::class);
        parent::setIndexPage('sections.config.categories');
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
