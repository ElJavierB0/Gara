<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener servicios de cada tipo
        $servicios = Service::where('type', 'servicio')->get();
        $reparaciones = Service::where('type', 'reparacion')->get();
        $modificaciones = Service::where('type', 'modificacion')->get();

        return view('home', compact('servicios', 'reparaciones', 'modificaciones'));
    }
}
