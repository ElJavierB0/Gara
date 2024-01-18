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
}