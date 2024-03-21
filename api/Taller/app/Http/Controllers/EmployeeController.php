<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class EmployeeController extends Controller
{
    // Función para mostrar el formulario de edición
    public function edit($id){
        $persona = User::findOrFail($id);
        return view('admin.employee.index', ['persona' => $persona]); 
    }

    // Función para actualizar los datos de la persona
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'required|string|max:10',
            'image' => 'sometimes|image', // Asegúrate de que sea un archivo de imagen y no solo un nombre de archivo
            'level_id' => 'required|in:1,2,3', // Validar que el nivel sea 2 o 3
        ]);

        // Buscar el usuario a actualizar
        $user = User::findOrFail($id);

        // Verificar si se ha cargado una nueva imagen
        if ($request->hasFile('image')) {
            // Almacenar la imagen en la carpeta deseada
            $imageName = $user->name . '.' . $request->image->extension();
            $request->image->move(public_path('image/Perfil'), $imageName);
            // Actualizar la ruta de la imagen en la base de datos
            $user->image = asset('image/Perfil/' . $imageName);
        }

        // Actualizar los campos del usuario
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->level_id = $request->level_id; // Actualizar el nivel

        // Guardar los cambios en la base de datos
        $user->save();

        // Redirigir al usuario a alguna vista después de la actualización
        return redirect()->route('personal')->with('success', 'Los datos se actualizaron correctamente.');
    }
}