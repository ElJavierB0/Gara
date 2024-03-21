<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    public function index()
    {
        // Verifica si el usuario está autenticado y si su nivel es igual a 3
        if (Auth::check() && Auth::user()->level_id == 3) {
            $records = Record::orderBy('id', 'asc')->paginate(10);
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
        } else {
            // Si el usuario no tiene el nivel adecuado, redirige con un mensaje de error
            return redirect()->route('admin')->with('error', 'No tienes permiso para acceder a los Registros.');
        }
    }
}
