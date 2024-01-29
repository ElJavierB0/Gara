<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Remplacements;
use Illuminate\Http\Request;

class RemplacementsController extends Controller
{
    public function list() {
        $remplacements =  Remplacements::all();
        $list = [];
        foreach($remplacements as $remplacement) {
            $object = [
                "id" => $remplacement->id,
                "Nombre" => $remplacement->name,
                "Tipo" => $remplacement->type,
                "created" => $remplacement->created_at,
                "updated" => $remplacement->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $remplacements =  Remplacements::where('id', '=', $id)->first();
        $object = [
            "id" => $remplacements->id,
            "Nombre" => $remplacements->name,
            "Tipo" => $remplacements->type,
            "created" => $remplacements->created_at,
            "updated" => $remplacements->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
        ]);
        $remplacements = Remplacements::create([
            'name'=>$data['name'],
            'type'=>$data['type'],
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
        ]);

        $remplacements =  Remplacements::where('id', '=', $data['id'])->first();

        $remplacements->name = $data['name'];
        $remplacements->type = $data['type'];

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
