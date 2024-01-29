<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list() {
        $admins =  Admin::all();
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
        $admin =  Admin::where('id', '=', $id)->first();
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
        $admins = Admin::create([
            'name'=>$data['name'],
            'nick'=>$data['nick'],
            'password'=> $data['password'],
            'img'=>$data['img']
        ]);
        if ($admins) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $admins,
            ];
            return response()->json($object);
        }else{
            $object = [
                "response" => 'Error: Something went wrong, please try again.'
            ];
            return response()->json($object);
        }
    }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|int',
            'name' => 'string',
            'nick' => 'string',
            'password' => 'required|string',
            'img' => 'required|string',
        ]);

        $admin =  Admin::where('id', '=', $data['id'])->first();

        $admin->name = $data['name'];
        $admin->nick = $data['nick'];
        $admin->password = $data['password'];
        $admin->img = $data['img'];

        if ($admin->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $admin,
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
