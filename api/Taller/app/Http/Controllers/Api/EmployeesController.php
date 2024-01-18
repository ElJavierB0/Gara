<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function list() {
        $employees =  Employees::all();
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
        $employee =  Employees::where('id', '=', $id)->first();
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
}
