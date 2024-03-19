@extends('layouts.panel')

@section('title', 'Editar Servicio')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <a href="{{ route('service') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Editar Servicio
        </h1>
        <div class="row">
            <!-- Lado izquierdo: Contenedor actual -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('service-update', ['id' => $service->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option value="Servicio" {{ $service->type == 'Servicio' ? 'selected' : '' }}>Servicio</option>
                                    <option value="Reparacion" {{ $service->type == 'Reparacion' ? 'selected' : '' }}>Reparación</option>
                                    <option value="Modificacion" {{ $service->type == 'Modificacion' ? 'selected' : '' }}>Modificación</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="disponibility" class="form-label">Disponibilidad</label>
                                <select class="form-select" id="disponibility" name="disponibility" required>
                                    <option value="Disponible" {{ $service->disponibility == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                    <option value="No Disponible" {{ $service->disponibility == 'No Disponible' ? 'selected' : '' }}>No Disponible</option>
                                </select>
                            </div>                            
                            <div class="mb-3">
                                <label for="desc" class="form-label">Descripción</label>
                                <textarea class="form-control" id="desc" name="desc" rows="3">{{ $service->desc }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Lado derecho: Contenedor para vista previa del servicio -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="img" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                        @if($service->img)
                            <h5 class="card-title">Vista Previa del Servicio</h5>
                            <hr>
                            <img src="{{ asset('image/Servicios/' . $service->img) }}" alt="Vista Previa del Servicio" class="img-fluid">
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
