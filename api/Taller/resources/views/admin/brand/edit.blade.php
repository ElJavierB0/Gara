@extends('layouts.panel')

@section('title', 'Editar Marca')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <a href="{{ route('brand') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Editar Marca
        </h1>
        <div class="row">
            <!-- Lado izquierdo: Contenedor actual -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('brand-update', ['id' => $brand->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}" >
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo" value="{{ $brand->logo }}" >
                            </div>
                            <div class="form-group">
                                <label for="category_id">Categoría</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <option value="">Selecciona una categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $brand->category_id ? 'selected' : '' }}>
                                            {{ $category->type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Lado derecho: Contenedor para vista previa del logo -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        @if($brand->logo)
                        <h5 class="card-title">Vista Previa del Logo</h5>
                        <hr> <!-- División añadida -->
                        <img src="{{ asset('image/Marcas/' . $brand->logo) }}" alt="{{ $brand->logo }}" class="img-fluid">
                        @else
                            <p class="text-center">No existe vista previa</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection