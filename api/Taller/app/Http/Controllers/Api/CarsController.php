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

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
            'img' => 'required|string',
            'brand_id' => 'required|int',
        ]);
        $cars = Cars::create([
            'name'=>$data['name'],
            'status'=>$data['status'],
            'img'=>$data['img'],
            'brand_id'=>$data['brand_id']
        ]);
        if ($cars) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $cars,
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
            'status' => 'string',
            'img' => 'string',
            'brand_id' => 'required|int',
        ]);

        $cars =  Cars::where('id', '=', $data['id'])->first();

        $cars->name = $data['name'];
        $cars->status = $data['status'];
        $cars->img = $data['img'];
        $cars->brand_id = $data['brand_id'];

        if ($cars->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $cars,
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
