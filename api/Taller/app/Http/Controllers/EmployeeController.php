<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('admin.employee.index'); 
    }
}

// public function index(){
//     return view('home'); 
// }
