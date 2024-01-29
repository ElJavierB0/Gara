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

    // public function create(Request $request) {
    //     $data = $request->validate([
    //         'name' => 'required|string',
    //         'surname' => 'required|string',
    //         'email' => 'required','string',
    //         'phone' => 'required|int',
    //         'password' => 'required|string',
    //         'image' => 'required|string'
    //     ]);
    //     $users = Users::create([
    //         'name'=>$data['name'],
    //         'surname'=>$data['surname'],
    //         'email'=>$data['email'],
    //         'phone'=>$data['phone'],
    //         'password'=>$data['password'],
    //         'image'=>$data['image']
    //     ]);
    //     if ($users) {
    //         $object = [
    //             "response" => 'Success. Item saved correctly.',
    //             "data" => $users,
    //         ];
    //         return response()->json($object);
    //     }else{
    //         $object = [
    //             "response" => 'Error: Something went wrong, please try again.'
    //         ];
    //         return response()->json($object);
    //     }
    // }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|int',
            'email' => 'required|string',
            'phone' => 'required|int',
            'image' => 'required|string',
        ]);

        $users =  Users::where('id', '=', $data['id'])->first();

        $users->email = $data['email'];
        $users->phone = $data['phone'];
        $users->image = $data['image'];

        if ($users->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $users    ,
            ];
            return response()->json($object);
        }else{
            $object = [
                "response" => 'Error: Something went wrong, please try again.'
            ];
            return response()->json($object);
        }
    }
}
