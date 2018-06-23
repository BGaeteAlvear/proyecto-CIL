<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CrudHelper\ControllerCrud;
use App\Http\Controllers\CrudHelper\ControllerUtils;
use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;


class UserController extends ControllerCrud
{

    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('sections.management.users.index')->with(['roles' => $roles]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function getAll(Request $request)
    {
        parent::setCustomQueryGetAll(User::with('role')->orderBy('role_id', 'asc')->get());
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

            try{

                Mail::send('emails.send-new-account', ['user' => $user, 'password' => $request->password], function ($message) use ($user)
                {
//                    $message->from('mantenedorcontenidobrainy@gmail.com', 'Mantenedor Contenidos Brainy');
                    $message->to($user->email, $user->firstname)->subject('Contraseña de Acceso Mantenedor de Contenidos');

                });

            }catch (\Exception $e){
//                return ControllerUtils::errorResponseJson($e->getMessage());
            }

            if($user){
                return ControllerUtils::successResponseJson($user, "Registro creado correctamente.");
            }
            return ControllerUtils::errorResponseJson('No se ha podido realizar el registro.');
        }
        return ControllerUtils::errorResponseValidation($validator);


    }

    public function storeCustomer(Request $request)
    {
        //return response()->json($request);
        $rules = [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'firstname' => 'required',
            'lastname' => 'required'
        ];

        $messages = [
            'password.confirmed' => 'Contraseñas no coinciden. Ingrese nuevamente',
            'password.required' => 'Por favor ingrese contraseña',
            'firstname.required' => 'Ingrese Nombre',
            'lastname.required' => 'Ingrese Apellido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        //dd($validator);
        if ($validator->passes()) {

            $user = new User();

            $user->email = $request->email;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->second_lastname = $request->second_lastname;
            $user->password = bcrypt($request->password);
            $user->role_id = 3;

            $user->save();

            Session()->flash('exito', 'Usuario registrado exitosamente!');

            return redirect()->route('register');

            try{

                Mail::send('emails.send-new-account', ['user' => $user, 'password' => $request->password], function ($message) use ($user)
                {
//
                    $message->to($user->email, $user->firstname)->subject('Contraseña de Acceso BeGames');

                });

            }catch (\Exception $e){
//                return ControllerUtils::errorResponseJson($e->getMessage());
            }

            if($user){
                return ControllerUtils::successResponseJson($user, "Registro creado correctamente.");
                return redirect()->route('login');
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
                //return $request->avatar;
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

    public function getProfile()
    {
        return view('sections.profile.index');
    }

}
