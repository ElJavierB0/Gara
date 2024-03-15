<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Obtener administradores
        $admins = Admin::all();
        
        // Obtener empleados
        $employees = Employee::all();
        
        // Obtener usuarios con nivel 3 (administradores)
        $adminUsers = User::where('level_id', 3)->get();
        
        // Obtener usuarios con nivel 2 (empleados)
        $employeeUsers = User::where('level_id', 2)->get();

        return view('admin.personal.index', compact('admins', 'employees', 'adminUsers', 'employeeUsers'));
    }
}
