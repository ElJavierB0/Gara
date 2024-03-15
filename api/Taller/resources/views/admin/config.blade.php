@extends('layouts.panel')

@section('title', 'Config-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #f8f9fa; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Mis Datos
        </h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user me-1"></i>
                        Información Personal
                        <a href="#" class="float-end"><i class="fas fa-edit" style="color:#212529"></i></a>
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Apellido:</strong> {{ auth()->user()->surname }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                        <p><strong>Rol:</strong> {{ auth()->user()->level->name }}</p>
                        <p><strong>Fecha de Registro:</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Aquí puedes agregar más tarjetas para mostrar más información si lo necesitas -->
            </div>
        </div>
    </div>
</main>
@endsection
