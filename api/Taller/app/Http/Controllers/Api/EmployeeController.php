<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function list() {
        $employees =  Employee::all();
        $list = [];
        foreach($employees as $employee) {
            $object = [
                "id" => $employee->id,
                "Nombre" => $employee->name,
                "Apellido" => $employee->lastn,
                "Contraseña" => $employee->password,
                "Imagen" => $employee->img,
                "Celular" => $employee->number,
                "created" => $employee->created_at,
                "updated" => $employee->updated_at
            ];
            array_push($list, $object);
        }
        return response()->json($list);
    }

    public function item($id) {
        $employee =  Employee::where('id', '=', $id)->first();
        $object = [
            "id" => $employee->id,
            "Nombre" => $employee->name,
            "Apellido" => $employee->lastn,
            "Contraseña" => $employee->password,
            "Imagen" => $employee->img,
            "Celular" => $employee->number,
            "created" => $employee->created_at,
            "updated" => $employee->updated_at
        ];
        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'lastn' => 'required|string',
            'password' => 'required|string',
            'img' => 'required|string',
            'number' => 'required|int',
        ]);
        $employees = Employee::create([
            'name'=>$data['name'],
            'lastn'=>$data['lastn'],
            'password'=>$data['password'],
            'img'=>$data['img'],
            'number'=>$data['number'],
        ]);
        if ($employees) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $employees,
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
            'img' => 'required|string',
            'number' => 'required|string',
        ]);

        $employees =  Employee::where('id', '=', $data['id'])->first();

        $employees->img = $data['img'];
        $employees->number = $data['number'];

        if ($employees->update()) {
            $object = [
                "response" => 'Success. Item saved correctly.',
                "data" => $employees,
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
