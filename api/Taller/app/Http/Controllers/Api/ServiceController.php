<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list() {
        $services =  Service::all();
        $list = [];
        foreach($services as $service) {
            $object = [
                "id" => $service->id,
                "Nombre" => $service->name,
                "Tipo" => $service->type,
                "Disponibilidad" => $service->disponibility,
                "Descripcion" => $service->desc,
                "created" => $service->created_at,
                "updated" => $service->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $services =  Service::where('id', '=', $id)->first();
        $object = [
            "id" => $services->id,
            "Nombre" => $services->name,
            "Tipo" => $services->type,
            "Disponibilidad" => $services->disponibility,
            "Descripcion" => $services->desc,
            "created" => $services->created_at,
            "updated" => $services->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'disponibility' => 'required',
            'desc' => 'required'
        ]);
        $services = Service::create([
            'name'=>$data['name'],
            'type'=>$data['type'],
            'disponibility'=>$data['disponibility'],
            'desc'=>$data['desc']
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

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|int',
            'name' => 'string',
            'type' => 'string',
            'disponibility' => 'string',
            'desc' => 'string'
        ]);

        $services =  Service::where('id', '=', $data['id'])->first();

        $services->name = $data['name'];
        $services->type = $data['type'];
        $services->disponibility = $data['disponibility'];
        $services->desc = $data['desc'];

        if ($services->update()) {
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