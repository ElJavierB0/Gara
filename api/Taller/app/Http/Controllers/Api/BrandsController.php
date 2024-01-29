<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function list() {
        $brands =  Brands::all();
        $list = [];
        foreach($brands as $brand) {
            $object = [
                "id" => $brand->id,
                "Nombre" => $brand->name,
                "Logo" => $brand->logo,
                "Categoria" => $brand->category_id,
                "created" => $brand->created_at,
                "updated" => $brand->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $brands =  Brands::where('id', '=', $id)->first();
        $object = [
            "id" => $brands->id,
            "Nombre" => $brands->name,
            "Logo" => $brands->logo,
            "Categoria" => $brands->category_id,
            "created" => $brands->created_at,
            "updated" => $brands->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|int',
        ]);
        $brands = Brands::create([
            'name'=>$data['name'],
            'category_id'=>$data['category_id'],
        ]);
        if ($brands) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $brands,
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
            'logo' => 'string',
            'category_id' => 'int',
        ]);

        $brands =  Brands::where('id', '=', $data['id'])->first();

        $brands->name = $data['name'];
        $brands->logo = $data['logo'];
        $brands->category_id = $data['category_id'];

        if ($brands->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $brands,
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
