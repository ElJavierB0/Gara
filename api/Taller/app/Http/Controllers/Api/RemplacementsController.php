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
}
