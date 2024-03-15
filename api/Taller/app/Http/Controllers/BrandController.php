<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::paginate(8); // Cambia 10 por el número de registros que deseas mostrar por página
        return view('admin.brand.index', compact('brands')); 
    }


    public function listForView()
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function edit($id){
        $brand = Brand::findOrFail($id);
        $categories = Category::all();
        return view('admin.brand.edit', compact('brand', 'categories')); 
    }
}
