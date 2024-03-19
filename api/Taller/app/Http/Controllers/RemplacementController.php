<?php

namespace App\Http\Controllers;

use App\Models\Remplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RemplacementController extends Controller
{
    public function index()
    {
        $remplacements = Remplacement::paginate(10);
        return view('admin.remplacement.index', compact('remplacements')); 
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'img' => 'nullable|image|max:10240',
        'description' => 'nullable|string',
    ]);

    $imgPath = null;

    if ($request->hasFile('img')) {
        $imgPath = $request->file('img')->store('remplacements', 'public');
    }

    Remplacement::create([
        'name' => $request->name,
        'type' => $request->type,
        'price' => $request->price,
        'img' => $imgPath ? 'image/Refacciones/' . $imgPath : null,
        'description' => $request->description,
    ]);

    return redirect()->route('remplacement')->with('success', 'Refacción agregada correctamente.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'price' => 'nullable|numeric|min:0',
        'img' => 'nullable|image|max:10240',
        'description' => 'nullable|string',
    ]);

    $remplacement = Remplacement::findOrFail($id);

    // Verificar si el usuario eligió eliminar la imagen actual
    if ($request->delete_img == 1 && $remplacement->img) {
        // Eliminar la imagen actual del almacenamiento
        Storage::disk('public')->delete($remplacement->img);
        // Establecer el campo de imagen en null en la base de datos
        $remplacement->img = null;
    }

    $remplacement->name = $request->name;
    $remplacement->type = $request->type;
    $remplacement->description = $request->description;

    // Procesar la imagen si se proporcionó una nueva
    if ($request->hasFile('img')) {
        // Eliminar la imagen actual si existe
        if ($remplacement->img) {
            Storage::disk('public')->delete($remplacement->img);
        }
        // Guardar la nueva imagen
        $imgPath = $request->file('img')->store('remplacements', 'public');
        $remplacement->img = $imgPath;
    }

    if ($request->filled('price')) {
        $remplacement->price = $request->price;
    }

    $remplacement->save();

    return redirect()->route('remplacement')->with('success', 'Refacción actualizada correctamente.');
}

    public function destroy($id)
    {
        $remplacement = Remplacement::find($id);
    
        if (!$remplacement) {
            return redirect()->back()->with('error', 'El Refacción no existe.');
        }
    
        $remplacement->delete();
    
        return redirect()->back()->with('success', '¡Refacción eliminada correctamente!');
    }    
    
    public function edit($id)
    {
        $remplacement = Remplacement::findOrFail($id);
        return view('admin.remplacement.edit', ['remplacement' => $remplacement]); 
    }
}
