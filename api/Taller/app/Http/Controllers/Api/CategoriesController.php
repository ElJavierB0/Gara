<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function list() {
        $categories =  Categories::all();
        $list = [];
        foreach($categories as $categorie) {
            $object = [
                "id" => $categorie->id,
                "Tipo" => $categorie->type,
                "Detalles" => $categorie->details,
                "created" => $categorie->created_at,
                "updated" => $categorie->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $categories =  Categories::where('id', '=', $id)->first();
        $object = [
            "id" => $categories->id,
            "Tipo" => $categories->type,
            "Detalles" => $categories->details,
            "created" => $categories->created_at,
            "updated" => $categories->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'type' => 'required|string',
            'details' => 'required|string',
        ]);
        $categories = Categories::create([
            'type'=>$data['type'],
            'details'=>$data['details'],
        ]);
        if ($categories) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $categories,
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
            'type' => 'string',
            'details' => 'string',
        ]);

        $categories =  Categories::where('id', '=', $data['id'])->first();

        $categories->type = $data['type'];
        $categories->details = $data['details'];

        if ($categories->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $categories,
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