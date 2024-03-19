<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

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
            'desc' => 'nullable|string',
            'img' => 'nullable|image|max:10240', // Max 10MB, ajusta el tamaño según tus necesidades
        ]);

        // Asignar la disponibility por defecto
        $disponibility = 'Disponible';

        // Subir la img si se proporcionó
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('services', 'public');
        }

        // Crear el servicio
        Service::create([
            'name' => $request->name,
            'type' => $request->type,
            'disponibility' => $disponibility,
            'desc' => $request->desc,
            'img' => $imgPath ? 'image/Servicios/' . $imgPath : null, // Concatenar la ruta de la img
        ]);

        return redirect()->route('service')->with('success', 'Servicio agregado correctamente.');
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:Servicio,Reparacion,Modificacion',
            'disponibility' => 'nullable|string|in:Disponible,No Disponible', // Aquí corregido
            'desc' => 'nullable|string',
            'img' => 'nullable|image|max:10240', // Max 10MB, ajusta el tamaño según tus necesidades
        ]);
    
        // Obtener el servicio a actualizar
        $service = Service::findOrFail($id);
    
        // Actualizar los campos del servicio
        $service->name = $request->name;
        $service->type = $request->type;
        $service->disponibility = $request->disponibility; // Aquí corregido
        $service->desc = $request->desc;
    
        // Subir la nueva img si se proporcionó
        if ($request->hasFile('img')) {
            // Eliminar la img anterior si existe
            if ($service->img) {
                unlink(public_path($service->img));
            }
            $imgPath = $request->file('img')->store('services', 'public');
            $service->img = 'image/Servicios/' . $imgPath; // Concatenar la ruta de la img
        }
    
        // Guardar los cambios
        $service->save();
    
        return redirect()->route('service')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
    
        if (!$service) {
            return redirect()->back()->with('error', 'El Servicio no existe.');
        }
    
        $service->delete();
    
        return redirect()->back()->with('success', '¡Servicio eliminado correctamente!');
    }    
    
    public function edit($id){
        $service = Service::findOrFail($id);
        return view('admin.service.edit', ['service' => $service]); 
    }
}
