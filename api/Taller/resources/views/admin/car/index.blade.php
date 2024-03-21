@extends('layouts.panel')

@section('title', 'Cars-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Autos
        </h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCarModal"><i class="fas fa-plus"></i> Añadir Carro</button>
        </div>        
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Lista de autos.
            </li>
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $cars->count() }}</b> resultados
                    de un total de <b>{{ $cars->total() }}</b>
                </div>
            </li>
        </ol>
        
        <table class="table table-hover" style="border: 2px solid #212529; color: #212529;">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Foto</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $loop->index + $cars->firstItem() }}</td>
                    <td>#{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->status }}</td>
                    <td>
                        @if ($car->img)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $car->id }}"><i class="fas fa-image"></i></a>
                        <!-- Ventana modal -->
                        <div class="modal fade" id="exampleModal{{ $car->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $car->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Para centrar la ventana modal -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $car->id }}">Foto de {{ $car->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center"> <!-- Para centrar la imagen en la ventana modal -->
                                        <img src="{{ asset('image/Carros/' . $car->img) }}" alt="Foto de perfil" class="custom-images" width="150%"> <!-- Se aplica la clase img-fluid para que la imagen se adapte al tamaño del contenedor -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            No
                        @endif
                    </td>
                    <td>{{ $car->brand->name }}</td> 
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('car-edit', $car->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            @auth
                                @if(auth()->user()->level_id == 3)
                                <form action="{{ route('car-delete', $car->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                @endif
                            @endauth
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" class="ulpgcds-pager">
                        {{ $cars->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div> 
</main>

<!-- Modal para agregar carro -->
<div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="addCarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarModalLabel">Añadir Carro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar carro -->
                <form action="{{ route('car-store') }}" method="POST">
                    @csrf
                    <!-- Aquí van los campos del formulario -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Selecciona un Estado</option>
                            <option value="Averiado">Averiado</option>
                            <option value="Falla Parcial">Falla Parcial</option>
                            <option value="Buen estado">Buen estado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Marca</label>
                        <select class="form-select" id="brand_id" name="brand_id" required>
                            <option value="">Selecciona una Marca</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
