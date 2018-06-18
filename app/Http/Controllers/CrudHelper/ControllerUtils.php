<?php

namespace App\Http\Controllers\CrudHelper;


use Illuminate\Support\Facades\Validator;

class ControllerUtils
{

    public static function errorResponseJson($message)
    {
        return response()->json([
            'status' => 'error',
            'errors' => [
                'message' => $message
            ]
        ]);
    }

    public static function successResponseJson($object, $message = null)
    {
        return response()->json([
            'status' => 'success',
            'entity' => $object,
            'message' => $message
        ]);
    }

    public static function errorResponseValidation($validator)
    {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ]);
    }

    public static function validate($requests, $rules, $customMessage = [])
    {
        return Validator::make($requests, $rules, $customMessage);
    }

}
