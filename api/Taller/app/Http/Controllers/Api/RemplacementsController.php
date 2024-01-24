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
        $services = Remplacements::create([
            'name'=>$data['name'],
            'type'=>$data['type'],
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
}
