@extends('layouts.panel')

@section('title', 'Editar Refacción')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('remplacement') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Editar Refacción
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('remplacement-update', $remplacement->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $remplacement->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo</label>
                                <input type="text" class="form-control" id="type" name="type" value="{{ $remplacement->type }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $remplacement->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Precio</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" value="{{ $remplacement->price }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="img" name="img" required>
                                <p class="text-muted">Deja este campo en blanco si no deseas cambiar la imagen.</p>
                            </div>
                            <div class="mb-3">
                                <label for="delete_img" class="form-label">Eliminar Imagen</label>
                                <select class="form-select" id="delete_img" name="delete_img">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                                <p class="text-muted">Selecciona "Sí" si deseas eliminar la imagen actual.</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
