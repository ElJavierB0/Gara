<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function list() {
        $admins =  Admins::all();
        $list = [];
        foreach($admins as $admin) {
            $object = [
                "id" => $admin->id,
                "Nombre" => $admin->name,
                "Nick" => $admin->nick,
                "Contraseña" => $admin->password,
                "Foto" => $admin->img,
                "created" => $admin->created_at,
                "updated" => $admin->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $admin =  Admins::where('id', '=', $id)->first();
        $object = [
            "id" => $admin->id,
            "Nombre" => $admin->name,
            "Nick" => $admin->nick,
            "Contraseña" => $admin->password,
            "Foto" => $admin->img,
            "created" => $admin->created_at,
            "updated" => $admin->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'nick' => 'required|string',
            'password' => 'required|string',
            'img' => 'required|string'
        ]);
        $services = Admins::create([
            'name'=>$data['name'],
            'nick'=>$data['nick'],
            'password'=> $data['password'],
            'img'=>$data['img']
        ]);
        if ($services) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $services,
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
