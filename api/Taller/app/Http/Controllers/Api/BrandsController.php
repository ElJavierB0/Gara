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
}
