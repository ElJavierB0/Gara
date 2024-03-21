<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Record;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // Obtener usuarios con nivel 3 (administradores)
        $adminUsers = User::where('level_id', 3)->get();
        // Obtener usuarios con nivel 2 (empleados)
        $employeeUsers = User::where('level_id', 2)->get();
        return view('admin.personal.index', compact('adminUsers', 'employeeUsers'));
    }

    public function indi()
    {
        // Obtener registros más recientes con los datos de los usuarios asociados y otros datos de registros
        $registrosRecientes = Record::with(['remplacement', 'service'])
                                    ->orderByDesc('date')
                                    ->take(5)
                                    ->get();

        // Obtener usuarios con nivel 2 (empleados)
        $empleados = User::where('level_id', 2)->get();
    
        // Obtener usuarios con nivel 1 (usuarios)
        $usuarios = User::where('level_id', 1)->get();

        // Obtener marcas más usadas con sus nombres
        $marcasMasUsadas = DB::table('cars')
                            ->join('brands', 'cars.brand_id', '=', 'brands.id')
                            ->select('brands.name as nombre', DB::raw('COUNT(*) as usos'))
                            ->groupBy('cars.brand_id', 'brands.name')
                            ->orderByDesc('usos')
                            ->limit(3)
                            ->get();
    
        // Obtener servicios más demandados
        $serviciosMasDemandados = DB::table('services')
                                    ->select('name', DB::raw('COUNT(*) as count'))
                                    ->groupBy('name')
                                    ->orderByDesc('count')
                                    ->limit(3)
                                    ->get();
    
        return view('admin.index', compact('registrosRecientes', 'marcasMasUsadas', 'serviciosMasDemandados', 'empleados', 'usuarios'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
            'name' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,'.$request->id,
            'phone' => 'nullable|string|max:10',
            'password' => 'nullable|string|min:8', // Se ha cambiado la validación para aceptar contraseñas de hasta 255 caracteres
            'image' => 'nullable|string|max:255',
            // Agrega aquí más validaciones según tus necesidades
        ]);
    
        $user = User::findOrFail($request->id);
    
        $userData = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $request->image,
            // Agrega aquí más campos según tus necesidades
        ];
    
        // Verificar si se proporcionó una nueva contraseña
        if ($request->password) {
            // Si se proporcionó, incluir la contraseña en los datos del usuario
            $userData['password'] = Hash::make($request->password);
        }
    
        $user->update($userData);
    
        return redirect()->back()->with('success', '¡Usuario actualizado correctamente!');
    }
    
    
        public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:10',
            'password' => 'required|string|min:8',
            'image' => 'image', // Eliminada la validación específica del tipo de imagen
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->status = 1; // Establecer el estado predeterminado
        $user->level_id = 3; // Establecer el nivel predeterminado

        // Guardar la imagen sin especificar un nombre específico
        $username = $request->name;

        // Establecer el nombre de la imagen utilizando el nombre de usuario
        $imageName = $username . '.' . $request->image->extension();
        
        // Mover la imagen a la carpeta deseada
        $request->image->move(public_path('image/Perfil'), $imageName);
        
        // Establecer la ruta de la imagen en la base de datos
        $user->image = asset('image/Perfil/' . $imageName);
        
        $user->save();
        return redirect()->back()->with('success', '¡Administrador añadido correctamente!');
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:10',
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image', // Validación de imagen
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->status = 1; // Establecer el estado predeterminado
        $user->level_id = 2; // Establecer el nivel predeterminado

        // Guardar la imagen sin especificar un nombre específico
        // Guardar la imagen sin especificar un nombre específico
        
        $user->save();

        return redirect()->back()->with('success', 'Empleado añadido correctamente!');
    }

    public function destroy($id)
{
    $adminUser = User::find($id);

    if (!$adminUser) {
        return redirect()->back()->with('error', 'El administrador no existe.');
    }

    // Verificar si el usuario es un empleado (nivel 2)
    if ($adminUser->level_id == 2) {
        $adminUser->delete();
        return redirect()->back()->with('success', 'El empleado se eliminó correctamente.');
    }

    // Verificar si el usuario es un administrador (nivel 3)
    if ($adminUser->level_id == 3) {
        $adminUser->delete();
        return redirect()->back()->with('success', 'El administrador se eliminó correctamente.');
    }

    return redirect()->back()->with('error', 'No tienes permisos para eliminar este usuario.');
}


}