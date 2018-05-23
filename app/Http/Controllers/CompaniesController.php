<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use App\Model\Company;

class CompaniesController extends ControllerCrud
{
    public function __construct()
    {
        parent::__construct(Company::class);
        parent::setIndexPage('sections.config.companies');
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
