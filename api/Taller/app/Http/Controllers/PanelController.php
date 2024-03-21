<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;
use App\Models\Remplacement;
use App\Models\Service;
use App\Models\User;

class PanelController extends Controller
{
    public function index(){
        return view('admin.index'); 
    }

    public function config(){
        return view('admin.config'); 
    }

    // public function search(Request $request)
    // {
    //     $searchTerm = $request->input('q');

    //     // Realiza la búsqueda en tus modelos utilizando consultas Eloquent
    //     $users = User::where('name', 'LIKE', '%' . $searchTerm . '%')
    //                     ->orWhere('surname', 'LIKE', '%' . $searchTerm . '%')
    //                     ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
    //                     ->orWhere('phone', 'LIKE', '%' . $searchTerm . '%')
    //                     ->get();

    //     $services = Service::where('name', 'LIKE', '%' . $searchTerm . '%')
    //                         ->orWhere('type', 'LIKE', '%' . $searchTerm . '%')
    //                         ->orWhere('disponibility', 'LIKE', '%' . $searchTerm . '%')
    //                         ->orWhere('desc', 'LIKE', '%' . $searchTerm . '%')
    //                         ->get();

    //     $remplacements = Remplacement::where('name', 'LIKE', '%' . $searchTerm . '%')
    //                                     ->orWhere('type', 'LIKE', '%' . $searchTerm . '%')
    //                                     ->orWhere('description', 'LIKE', '%' . $searchTerm . '%')
    //                                     ->orWhere('price', 'LIKE', '%' . $searchTerm . '%')
    //                                     ->get();

    //     $categories = Category::where('type', 'LIKE', '%' . $searchTerm . '%')
    //                             ->orWhere('details', 'LIKE', '%' . $searchTerm . '%')
    //                             ->get();

    //     $cars = Car::where('name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('status', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('brand_id', 'LIKE', '%' . $searchTerm . '%')
    //                 ->get();

    //     $brands = Car::where('name', 'LIKE', '%' . $searchTerm . '%')
    //                     ->orWhere('category_id', 'LIKE', '%' . $searchTerm . '%')
    //                     ->get();

    //     // Consolidar los resultados en un solo array asociativo
    //     $results = [
    //         'users' => $users,
    //         'services' => $services,
    //         'remplacements' => $remplacements,
    //         'categories' => $categories,
    //         'cars' => $cars,
    //         'brands' => $brands,
    //     ];

    //     // Retorna los resultados como respuesta JSON
    //     return view('admin.search'); 
    // }
}
