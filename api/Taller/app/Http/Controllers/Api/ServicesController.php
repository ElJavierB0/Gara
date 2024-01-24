<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function list() {
        $services =  Services::all();
        $list = [];
        foreach($services as $service) {
            $object = [
                "id" => $service->id,
                "Nombre" => $service->name,
                "Tipo" => $service->type,
                "Disponibilidad" => $service->disponibility,
                "created" => $service->created_at,
                "updated" => $service->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $services =  Services::where('id', '=', $id)->first();
        $object = [
            "id" => $services->id,
            "Nombre" => $services->name,
            "Tipo" => $services->type,
            "Disponibilidad" => $services->disponibility,
            "created" => $services->created_at,
            "updated" => $services->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'disponibility' => 'required|string'
        ]);
        $services = Services::create([
            'name'=>$data['name'],
            'type'=>$data['type'],
            'disponibility'=>$data['disponibility']
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