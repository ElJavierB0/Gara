<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemplacementController extends Controller
{
    public function index(){
        return view('admin.remplacement.index'); 
    }
}
