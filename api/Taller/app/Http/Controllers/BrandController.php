<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::orderBy('id', 'asc')->paginate(8);
        $categories = Category::all(); 
        return view('admin.brand.index', compact('brands', 'categories')); 
    }

    public function listForView()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.brand.index', compact('brands', 'categories'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'logo' => 'required|string|max:255',
        'category_id' => ['required', 'int', Rule::exists('categories', 'id')],
    ]);

    Brand::create([
        'name' => $request->name,
        'logo' => $request->logo,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('brand')->with('success', 'Marca creada correctamente');
}

    public function edit($id){
        $brand = Brand::findOrFail($id);
        $categories = Category::all();
        return view('admin.brand.edit', compact('brand', 'categories')); 
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'logo' => 'nullable|string|max:255',
        'category_id' => ['required', 'int', Rule::exists('categories', 'id')],
    ]);

    $brand = Brand::findOrFail($id);

    $brand->update([
        'name' => $request->name,
        'logo' => $request->logo,
        'category_id' => $request->category_id,
    ]);

    return redirect()->route('brand')->with('success', 'Marca actualizada correctamente');
}

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        
        // Eliminar la marca
        $brand->delete();

        // Redireccionar de vuelta a la página de marcas con un mensaje de éxito
        return redirect()->route('brand')->with('success', 'Marca eliminada correctamente');
    }
}
