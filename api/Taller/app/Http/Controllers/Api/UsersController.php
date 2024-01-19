<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function list() {
        $users =  User::all();
        $list = [];
        foreach($users as $user) {
            $object = [
                "id" => $user->id,
                "Nombre" => $user->name,
                "Apellido" => $user->surname,
                "Email" => $user->email,
                "Celular" => $user->phone,
                "Verficación" => $user->email_verifed_at,
                "Password" => $user->password,
                "Imagen" => $user->image,
                "Remember" => $user->remember_token,
                "created" => $user->created_at,
                "updated" => $user->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $users =  Users::where('id', '=', $id)->first();
        $object = [
            "id" => $users->id,
            "Nombre" => $users->name,
            "Apellido" => $users->surname,
            "Email" => $users->email,
            "Celular" => $users->phone,
            "Verficación" => $users->email_verifed_at,
            "Password" => $users->password,
            "Imagen" => $users->image,
            "Remember" => $users->remember_token,
            "created" => $users->created_at,
            "updated" => $users->updated_at
        ];
        return response()->json($object);
    }
}
