<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function list() {
        $cars =  Cars::all();
        $list = [];
        foreach($cars as $car) {
            $object = [
                "id" => $car->id,
                "Nombre" => $car->name,
                "Estado" => $car->status,
                "Imagen" => $car->img,
                "Marca" => $car->brand_id,
                "created" => $car->created_at,
                "updated" => $car->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $cars =  Cars::where('id', '=', $id)->first();
        $object = [
            "id" => $cars->id,
            "Nombre" => $cars->name,
            "Estado" => $cars->status,
            "Imagen" => $cars->img,
            "Marca" => $cars->brand_id,
            "created" => $cars->created_at,
            "updated" => $cars->updated_at
        ];
        return response()->json($object);
    }
}
