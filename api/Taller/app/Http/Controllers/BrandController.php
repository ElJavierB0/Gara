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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'string|max:255',
            'category_id' => 'int',
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
            'logo' => 'string|max:255',
            'category_id' => 'int',
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
