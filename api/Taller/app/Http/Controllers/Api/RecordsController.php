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

    // public function create(Request $request) {
    //     $data = $request->validate([
    //         'date' => 'required|string',
    //         'service_id' => 'required|string',
    //         'employee_id' => 'required|string',
    //         'remplacement_id' => 'required|string',
    //     ]);
    //     $records = Records::create([
    //         'name'=>$data['name'],
    //         'service_id'=>$data['service_id'],
    //         'employee_id'=>$data['employee_id']
    //         'remplacement_id'=>$data['remplacement_id']
    //     ]);
    //     if ($records) {
    //         $object = [
    //             "response" => 'Success. Item saved correctly.',
    //             "data" => $records,
    //         ];
    //         return response()->json($object);
    //     }else{
    //         $object = [
    //             "response" => 'Error: Something went wrong, please try again.'
    //         ];
    //         return response()->json($object);
    //     }
    // }

    public function update( Request $request){
        $data = $request->validate([
            'id' => 'required|int',
            'date' => 'string',
            'service_id' => 'required|string',
            'employee_id' => 'required|string',
            'remplacement_id' => 'required|string',
        ]);

        $records =  Records::where('id', '=', $data['id'])->first();

        $records->date = $data['date'];
        $records->service_id = $data['service_id'];
        $records->employee_id = $data['employee_id'];
        $records->remplacement_id = $data['remplacement_id'];

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
