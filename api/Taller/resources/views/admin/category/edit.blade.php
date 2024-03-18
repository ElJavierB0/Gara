@extends('layouts.panel')

@section('title', 'Editar Categoría')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('category') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Editar Categoría {{ $category->type }}
        </h1>
        <div class="mt-4">
            <form action="{{ route('category-update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="type" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $category->id }}" readonly>
                </div>
                <!-- Campos del formulario -->
                <div class="mb-3">
                    <label for="type" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="type" name="type" value="{{ $category->type }}" required>
                </div>
            
                <div class="mb-3">
                    <label for="details" class="form-label">Detalles</label>
                    <textarea class="form-control" id="details" name="details" rows="3">{{ $category->details }}</textarea>
                </div>
            
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
</main>
@endsection
