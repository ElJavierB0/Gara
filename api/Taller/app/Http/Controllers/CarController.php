<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CarController extends Controller
{
    public function index(){
        $cars = Car::paginate(10); // Cambia 10 por el número de registros que deseas mostrar por página
        return view('admin.car.index', compact('cars')); 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
            'img' => 'required',
            'brand_id' => 'required|exists:brands,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }
}
