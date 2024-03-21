<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Remplacement;
use App\Models\Service;

class PanelController extends Controller
{
    public function index(){
        return view('admin.index'); 
    }

    public function config(){
        return view('admin.config'); 
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $results = [];

    // Buscar en la tabla de Marcas
    $brands = Brand::where('name', 'LIKE', "%$query%")->get();
    foreach ($brands as $brand) {
        $results['Brand'][$brand->id] = $brand->name;
    }
    // Buscar en la tabla de Categorías
    $categories = Category::where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('type', 'LIKE', "%$query%")
                        ->orWhere('details', 'LIKE', "%$query%");
    })->get();
    foreach ($categories as $category) {
        $results['Category'][$category->id] = $category->type;
    }

    // Buscar en la tabla de Carros
    $cars = Car::where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('name', 'LIKE', "%$query%")
                        ->orWhere('status', 'LIKE', "%$query%");
    })->get();
    foreach ($cars as $car) {
        $results['Car'][$car->id] = $car->name;
    }

    // Buscar en la tabla de Servicios
    $services = Service::where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('name', 'LIKE', "%$query%")
                        ->orWhere('type', 'LIKE', "%$query%")
                        ->orWhere('disponibility', 'LIKE', "%$query%")
                        ->orWhere('desc', 'LIKE', "%$query%");
    })->get();
    foreach ($services as $serviCe) {
        $results['Service'][$serviCe->id] = $serviCe->name;
    }

    // Buscar en la tabla de Refacciones
    $remplacements = Remplacement::where(function ($queryBuilder) use ($query) {
        $queryBuilder->where('name', 'LIKE', "%$query%")
                        ->orWhere('type', 'LIKE', "%$query%")
                        ->orWhere('description', 'LIKE', "%$query%")
                        ->orWhere('price', 'LIKE', "%$query%");
    })->get();
    foreach ($remplacements as $remplacement) {
        $results['Remplacement'][$remplacement->id] = $remplacement->name;
    }

    return view('admin.busqueda', ['query' => $query, 'results' => $results]);
}
}
