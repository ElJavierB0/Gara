<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand; // Asegúrate de importar el modelo Brand

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
            'img' => 'string|max:255',
            'brand_id' => 'exists:brands,id', // Ahora es requerido y se verifica su existencia
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

    public function update(Request $request, Car $car)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'status' => 'required|in:Averiado,Falla Parcial,Buen estado',
        'img' => 'string|max:255',
        'brand_id' => 'exists:brands,id', // Ahora es requerido y se verifica su existencia
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $car->update($request->all());

    return redirect()->route('car', ['car' => $car->id])->with('success', 'Auto actualizado correctamente.');
}

public function destroy($id)
{
    $car = Car::find($id);

    if (!$car) {
        return redirect()->back()->with('error', 'El auto no existe.');
    }

    $car->delete();

    return redirect()->back()->with('success', '¡Auto eliminado correctamente!');
}    


}
