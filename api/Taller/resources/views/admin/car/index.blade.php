@extends('layouts.panel')

@section('title', 'Cars-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Autos
        </h1>
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
                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Acción a realizar
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Agregar</a></li>
                                <li><a class="dropdown-item" href="#">Modificar</a></li>
                                <li><a class="dropdown-item" href="#">Eliminar</a></li>
                            </ul>
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
@endsection
