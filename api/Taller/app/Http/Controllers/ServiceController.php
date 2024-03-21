<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'asc')->paginate(10);
        return view('admin.service.index', compact('services')); 
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:Servicio,Reparacion,Modificacion',
            'desc' => 'required|string',
            'img' => 'required|string|max:255', // Max 10MB, ajusta el tamaño según tus necesidades
        ]);

        // Subir la img si se proporcionó
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('services', 'public');
        }

        // Crear el servicio
        Service::create([
            'name' => $request->name,
            'type' => $request->type,
            'disponibility' => 'Disponible', // Por defecto
            'desc' => $request->desc,
            'img' => $imgPath ? 'image/Servicios/' . $imgPath : null, // Concatenar la ruta de la img
        ]);

        return redirect()->route('service')->with('success', 'Servicio agregado correctamente.');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'nullable|string|in:Servicio,Reparacion,Modificacion',
        'disponibility' => 'nullable|string|in:Disponible,No Disponible', 
        'desc' => 'nullable|string',
        'img' => 'nullable|image|max:10240',
    ]);

    $services = Service::findOrFail($id);

    // Verificar si el usuario eligió eliminar la imagen actual
    if ($request->delete_img == 1 && $services->img) {
        // Eliminar la imagen actual del almacenamiento
        Storage::disk('public')->delete($services->img);
        // Establecer el campo de imagen en null en la base de datos
        $services->img = null;
    }

    $services->name = $request->name;
    $services->type = $request->type;
    $services->desc = $request->desc;

    // Procesar la imagen si se proporcionó una nueva
    if ($request->hasFile('img')) {
        // Eliminar la imagen actual si existe
        if ($services->img) {
            Storage::disk('public')->delete($services->img);
        }
        // Guardar la nueva imagen
        $imgPath = $request->file('img')->store('Servicios', 'public');
        $services->img = $imgPath;
    }

    if ($request->filled('price')) {
        $services->price = $request->price;
    }

    $services->save();

    return redirect()->route('service')->with('success', 'Servicio actualizado correctamente.');
}

public function destroy($id)
{
    $services = Service::find($id);

    if (!$services) {
        return redirect()->route('service')->with('error', 'El Servicio no existe.');
    }

    $services->delete();

    return redirect()->route('service')->with('success', '¡Servicio eliminado correctamente!');
}    

public function edit($id)
{
    $service = Service::findOrFail($id);
    return view('admin.service.edit', ['service' => $service]); 
}
}
