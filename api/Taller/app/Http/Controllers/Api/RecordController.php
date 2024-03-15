<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function list() {
        $records =  Record::all();
        $list = [];
        foreach($records as $record) {
            $object = [
                "id" => $record->id,
                "Fecha" => $record->date,
                "Servicio" => $record->service,
                "Empleado" => $record->employee,
                "Refacción" => $record->remplacement,
                "created" => $record->created_at,
                "updated" => $record->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $record =  Record::where('id', '=', $id)->first();
        $object = [
            "id" => $record->id,
            "Fecha" => $record->date,
            "Servicio" => $record->service,
            "Empleado" => $record->employee,
            "Refacción" => $record->remplacement,
            "created" => $record->created_at,
            "updated" => $record->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'date' => 'required|string',
            'service' => 'required|string',
            'employee' => 'required|string',
            'remplacement' => 'required|string',
        ]);
        $records = Record::create([
            'name'=>$data['name'],
            'service'=>$data['service'],
            'employee'=>$data['employee'],
            'remplacement'=>$data['remplacement']
        ]);
        if ($records) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $records,
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
            'date' => 'string',
            'service' => 'required|string',
            'employee' => 'required|string',
            'remplacement' => 'required|string',
        ]);

        $records =  Record::where('id', '=', $data['id'])->first();

        $records->date = $data['date'];
        $records->service = $data['service'];
        $records->employee = $data['employee'];
        $records->remplacement = $data['remplacement'];

        if ($records->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $records,
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
