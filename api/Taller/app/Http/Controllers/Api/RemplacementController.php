<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Remplacement;
use Illuminate\Http\Request;

class RemplacementController extends Controller
{
    public function list() {
        $remplacements =  Remplacement::all();
        $list = [];
        foreach($remplacements as $remplacement) {
            $object = [
                "id" => $remplacement->id,
                "name" => $remplacement->name,
                "type" => $remplacement->type,
                "description" => $remplacement->description,
                "price" => $remplacement->price,
                "img" => $remplacement->img,
                "created" => $remplacement->created_at,
                "updated" => $remplacement->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $remplacements =  Remplacement::where('id', '=', $id)->first();
        $object = [
            "id" => $remplacements->id,
            "name" => $remplacements->name,
            "type" => $remplacements->type,
            "description" => $remplacements->description,
            "price" => $remplacements->price,
            "img" => $remplacements->img,
            "created" => $remplacements->created_at,
            "updated" => $remplacements->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|int',
            'img' => 'required|string',
        ]);
        $remplacements = Remplacement::create([
            'name'=>$data['name'],
            'type'=>$data['type'],
            'description'=>$data['description'],
            'price'=>$data['price'],
            'img'=>$data['img'],
        ]);
        if ($remplacements) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $remplacements,
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
            'description' => 'string',
            'price' => 'int',
            'img' => 'string',
        ]);

        $remplacements =  Remplacement::where('id', '=', $data['id'])->first();

        $remplacements->name = $data['name'];
        $remplacements->type = $data['type'];
        $remplacements->type = $data['description'];
        $remplacements->type = $data['price'];
        $remplacements->type = $data['img'];

        if ($remplacements->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $remplacements,
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
