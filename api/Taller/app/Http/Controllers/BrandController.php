<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
        ]);
    
        // Obtener la marca a actualizar
        $brand = Brand::find($id);
    
        if (!$brand) {
            return back()->withErrors(['error' => 'Marca no encontrada.']);
        }
    
        // Actualizar los campos
        $brand->name = $request->name;
        $brand->category_id = $request->category_id;
    
        // Si se proporciona una nueva imagen, actualizarla
        if ($request->hasFile('logo')) {
            // Eliminar la imagen anterior, si existe
            if ($brand->logo) {
                Storage::delete('image/Marcas/' . $brand->logo);
            }
    
            // Generar un nombre único para la imagen
            $imageName = uniqid() . '.' . $request->logo->getClientOriginalExtension();
    
            // Guardar la nueva imagen en la ruta especificada con el nombre único
            $request->logo->move(public_path('image/Marcas'), $imageName);

    
            // Actualizar el campo de la imagen en la base de datos con el nombre único
            $brand->logo = $imageName;
        }
    
        // Guardar los cambios
        if ($brand->save()) {
            return redirect()->route('brand')->with('success', '¡La marca se ha actualizado correctamente!');
        } else {
            return back()->withErrors(['error' => 'Error al actualizar la marca. Por favor, inténtelo de nuevo.']);
        }
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
