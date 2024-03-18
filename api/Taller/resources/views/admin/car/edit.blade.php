@extends('layouts.panel')

@section('title', 'Editar Auto')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <a href="{{ route('car') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Editar Auto {{ $car->name }}
        </h1>
        <div class="row">
            <!-- Lado izquierdo: Contenedor actual -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('car-update', ['car' => $car->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $car->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Estado</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Averiado" {{ $car->status == 'Averiado' ? 'selected' : '' }}>Averiado</option>
                                    <option value="Falla Parcial" {{ $car->status == 'Falla Parcial' ? 'selected' : '' }}>Falla Parcial</option>
                                    <option value="Buen estado" {{ $car->status == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="img" name="img">
                            </div>
                            <div class="mb-3">
                                <label for="brand_id" class="form-label">Marca</label>
                                <select class="form-select" id="brand_id" name="brand_id" required>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $car->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Lado derecho: Contenedor para vista previa del auto -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        @if($car->img)
                            <h5 class="card-title">Vista Previa del Carro</h5>
                            <hr>
                            <img src="{{ asset('image/Carros/' . $car->img) }}" alt="Vista Previa del Carro" class="img-fluid">
                        @else
                            <p class="text-center">No hay imagen disponible</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
