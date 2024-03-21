<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand; // Asegúrate de importar el modelo Brand
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class CarController extends Controller
{
    public function index()
    {
        $cars = Car::orderBy('id', 'asc')->paginate(10);
        $brands = Brand::all(); // Obtener todas las marcas disponibles
        return view('admin.car.index', compact('cars', 'brands'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|in:Averiado,Falla Parcial,Buen estado',
            'img' => 'nullable|string|max:255',
            'brand_id' => 'required|exists:brands,id', // Ahora es requerido y se verifica su existencia
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Car::create($request->all());

        return redirect()->route('car')->with('success', 'Auto creado correctamente.');
    }

    public function edit(Car $car)
    {
        $brand = Brand::find($car->brand_id); // Obtener la marca del auto
    $brands = Brand::all(); // Obtener todas las marcas disponibles
    return view('admin.car.edit', compact('car', 'brand', 'brands'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'status' => 'required',
        'img' => 'nullable|image',
        'brand_id' => ['required', 'integer', Rule::exists('brands', 'id')],// Ahora es requerido y se verifica su existencia
    ]);

     // Obtener la marca a actualizar
     $car = Car::find($id);

     if (!$car) {
        return back()->withErrors(['error' => 'Carro no encontrado.']);
    }
   
    // Actualizar los campos del auto
    $car->name = $request->name;
    $car->status = $request->status;
    $car->brand_id = $request->brand_id;

    // Si se proporciona una nueva imagen, actualizarla
    if ($request->hasFile('img')) {
        // Eliminar la imagen anterior, si existe
        if ($car->img) {
            Storage::delete('image/Carros/' . $car->img);
        }

        // Generar un nombre único para la imagen
        $imageName = uniqid() . '.' . $request->img->getClientOriginalExtension();

        // Guardar la nueva imagen en la carpeta storage/app/image/Carros
        $request->img->move(public_path('image/Carros'), $imageName);

        // Actualizar el campo de la imagen en la base de datos con el nombre único
        $car->img = $imageName;
    }

     // Guardar los cambios
     if ($car->save()) {
        return redirect()->route('car')->with('success', '¡El auto se ha actualizado correctamente!');
    
}

}




public function destroy($id)
    {
        $car = Car::findOrFail($id);
        
        // Eliminar la marca
        $car->delete();

        // Redireccionar de vuelta a la página de marcas con un mensaje de éxito
        return redirect()->route('car')->with('success', 'Carro eliminada correctamente');
    }
}
