<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function list() {
        $cars =  Car::all();
        $list = [];
        foreach($cars as $car) {
            $object = [
                "id" => $car->id,
                "Nombre" => $car->name,
                "Estado" => $car->status,
                "Imagen" => $car->img,
                "Marca" => $car->brand,
                "created" => $car->created_at,
                "updated" => $car->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $cars =  Car::where('id', '=', $id)->first();
        $object = [
            "id" => $cars->id,
            "Nombre" => $cars->name,
            "Estado" => $cars->status,
            "Imagen" => $cars->img,
            "Marca" => $cars->brand,
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
            'brand' => 'required|int',
        ]);
        $cars = Car::create([
            'name'=>$data['name'],
            'status'=>$data['status'],
            'img'=>$data['img'],
            'brand'=>$data['brand']
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
            'brand' => 'required|int',
        ]);

        $cars =  Car::where('id', '=', $data['id'])->first();

        $cars->name = $data['name'];
        $cars->status = $data['status'];
        $cars->img = $data['img'];
        $cars->brand = $data['brand'];

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
