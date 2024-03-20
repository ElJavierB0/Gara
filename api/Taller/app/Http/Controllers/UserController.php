<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('level_id', 1)->orderBy('id', 'asc')->paginate(10);

        return view('admin.user.index', compact('users')); 
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user')->with('error', 'El Usuario no existe.');
        }

        return view('admin.user.edit', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user')->with('error', 'El Usuario no existe.');
        }

        $user->delete();

        return redirect()->route('user')->with('success', 'Usuario eliminado correctamente!');
    }   

    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'phone' => 'nullable|string|max:10',
            'password' => 'nullable|string|min:8',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Establecer status y level_id en 1
        $request->merge(['status' => 1, 'level_id' => 1]);

        // Crear el usuario con los datos del formulario
        User::create($request->all());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('user')->with('success', 'Usuario creado correctamente.');
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user')->with('error', 'El Usuario no existe.');
        }

        $request->validate([
            'name' => 'string|max:255',
            'surname' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:10',
            'password' => 'string|min:8', // Contraseña no es requerida
            'image' => 'nullable|string|max:255',
            'status' => 'string|in:0,1', // Acepta solo '0' o '1' como valores válidos
            'level_id' => 'integer|min:1|max:3', // level_id entre 1 y 3
        ]);

        // Actualizar solo los campos que no son nulos
        $user->fill($request->all());

        // Asegurar que status y level_id estén en un rango válido
        if ($request->has('status')) {
            $user->status = $request->status; // No es necesario validar aquí, ya que la validación anterior garantiza que solo se puede pasar '0' o '1'
        }
        if ($request->has('level_id')) {
            $user->level_id = min(max($request->level_id, 1), 3);
        }

        $user->save();

        return redirect()->route('user')->with('success', 'Usuario actualizado correctamente.');
    }

}
