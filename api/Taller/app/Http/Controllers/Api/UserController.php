<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
                "Status" => $user->status,
                "Nivel" => $user->level,
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
        $users =  User::where('id', '=', $id)->first();
        $object = [
            "id" => $users->id,
            "Nombre" => $users->name,
            "Apellido" => $users->surname,
            "Email" => $users->email,
            "Celular" => $users->phone,
            "Verficación" => $users->email_verifed_at,
            "Status" => $users->status,
            "Nivel" => $users->level,
            "Imagen" => $users->image,
            "Remember" => $users->remember_token,
            "created" => $users->created_at,
            "updated" => $users->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|numeric',
            'password' => 'required|string',
            'level_id' => 'nullable|string', // Hacer que level_id sea opcional
            'image' => 'nullable|string', // Hacer que image sea opcional
        ]);
    
        // Encriptar la contraseña con bcrypt
        $hashedPassword = bcrypt($data['password']);
    
        // Verificar si level_id está presente en $data, si no, asignar un valor predeterminado
        $levelId = array_key_exists('level_id', $data) ? $data['level_id'] : 1;
    
        // Verificar si image está presente en $data, si no, asignar un valor predeterminado
        $image = array_key_exists('image', $data) ? $data['image'] : 'placeholder.jpg';
    
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $hashedPassword,
            'level_id' => $levelId,
            'image' => $image,
            // Otros campos según sea necesario
        ]);
    
        if ($user) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $user,
            ];
            return response()->json($object);
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.'
            ];
            return response()->json($object);
        }
    }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|int',
            'email' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string',
            'image' => 'required|string',
        ]);

        $users =  User::where('id', '=', $data['id'])->first();

        $users->name = $data['name'];
        $users->surname = $data['surname'];
        $users->email = $data['email'];
        $users->password = $data['password'];
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
