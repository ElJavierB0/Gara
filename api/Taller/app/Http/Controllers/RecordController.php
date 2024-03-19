<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index(){
        $records = Record::orderBy('id', 'asc')->paginate(10); // Cambia 10 por el número de registros que deseas mostrar por página
        
    // Obtener registros más recientes con los datos de los usuarios asociados y otros datos de registros
    $registros = Record::with(['remplacement', 'service'])
                        ->orderByDesc('date')
                        ->take(5)
                        ->get();

                        // Obtener usuarios con nivel 2 (empleados)
                        $empleados = User::where('level_id', 2)->get();

                        // Obtener usuarios con nivel 1 (usuarios)
                        $usuarios = User::where('level_id', 1)->get();

        return view('admin.record.index', compact('records', 'registros', 'empleados', 'usuarios')); 
    }
}
