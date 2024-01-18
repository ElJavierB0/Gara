<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Records;
use Illuminate\Http\Request;

class RecordsController extends Controller
{
    public function list() {
        $records =  Records::all();
        $list = [];
        foreach($records as $record) {
            $object = [
                "id" => $record->id,
                "Fecha" => $record->date,
                "Servicio" => $record->service_id,
                "Empleado" => $record->employee_id,
                "Refacción" => $record->remplacement_id,
                "created" => $record->created_at,
                "updated" => $record->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $record =  Records::where('id', '=', $id)->first();
        $object = [
            "id" => $record->id,
            "Fecha" => $record->date,
            "Servicio" => $record->service_id,
            "Empleado" => $record->employee_id,
            "Refacción" => $record->remplacement_id,
            "created" => $record->created_at,
            "updated" => $record->updated_at
        ];
        return response()->json($object);
    }
}
