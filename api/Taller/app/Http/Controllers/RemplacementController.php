<?php

namespace App\Http\Controllers;

use App\Models\Remplacement;
use Illuminate\Http\Request;

class RemplacementController extends Controller
{
    public function index(){
        $remplacements = Remplacement::paginate(10); // Cambia 10 por el número de registros que deseas mostrar por página
        return view('admin.remplacement.index', compact('remplacements')); 
    }

}
