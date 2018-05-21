<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use App\Http\Controllers\CrudHelper\ControllerUtils;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends ControllerCrud
{

    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function index()
    {
        $roles = Role::all();
        return view('sections.users.index')->with(['roles' => $roles]);
    }

    public function getAll(Request $request)
    {
        parent::setCustomQueryGetAll(User::with('role')->orderBy('role_id', 'desc')->get());
        return parent::getAll($request);
    }

    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|string',
            'role_id' => 'required',
            'avatar' => 'mimes:jpeg,bmp,png,gif,jpg'
        ];

        $messages = [
            'role_id.required' => 'Debes seleccionar un rol para el usuario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $user = new User();

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->second_lastname = $request->second_lastname;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;

            if ($request->hasFile('avatar')) {
                $user->avatar = $request->file('avatar')->store('public/avatars');
            }

            $user->save();

            if($user){
                return ControllerUtils::successResponseJson($user, "Registro creado correctamente.");
            }
            return ControllerUtils::errorResponseJson('No se ha podido realizar el registro.');
        }
        return ControllerUtils::errorResponseValidation($validator);


    }

    public function update(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users,email,'.$request->id,
            'role_id' => 'required',
            'avatar' => 'mimes:jpeg,bmp,png,gif,jpg'  . $request->id
        ];

        $messages = [
            'role_id.required' => 'Debes seleccionar un rol para el usuario'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $user = User::with('role')->find($request->id);

            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->second_lastname = $request->second_lastname;
            $user->email = $request->email;
//            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;

            if ($request->hasFile('avatar')) {
                $user->avatar = $request->file('avatar')->store('public/avatars');
            }

            $user->save();

            if($user){
                return ControllerUtils::successResponseJson($user, "Registro creado correctamente.");
            }
            return ControllerUtils::errorResponseJson('No se ha podido realizar el registro.');
        }
        return ControllerUtils::errorResponseValidation($validator);


    }

    public function changeStatus(Request $request)
    {
        parent::setCustomQueryChangeStatus(User::with('role')->find($request->id));
        return parent::changeStatus($request); // TODO: Change the autogenerated stub
    }

    public function create()
    {
        $roles = Role::all();
        return view('sections.users.create')->with(['roles' => $roles]);
    }
}
