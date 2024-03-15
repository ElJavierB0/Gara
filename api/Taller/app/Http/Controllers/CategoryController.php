<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10); // Cambia 10 por el número de registros que deseas mostrar por página
        return view('admin.category.index', compact('categories')); 
    }

}
