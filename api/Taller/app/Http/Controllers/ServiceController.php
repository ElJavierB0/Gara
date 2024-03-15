<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::paginate(10); // Cambia 10 por el número de registros que deseas mostrar por página
        return view('admin.service.index', compact('services')); 
    }

}
