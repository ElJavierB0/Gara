<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index(){
        $records = Record::orderBy('id', 'asc')->paginate(10); // Cambia 10 por el número de registros que deseas mostrar por página
        return view('admin.record.index', compact('records')); 
    }
}
