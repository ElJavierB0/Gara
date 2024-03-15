@extends('layouts.panel')

@section('title', 'Service-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Servicios
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Lista de servicios.
            </li>
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $services->count() }}</b> resultados
                    de un total de <b>{{ $services->total() }}</b>
                </div>
            </li>
        </ol>
        
        <table class="table table-hover" style="border: 2px solid #212529; color: #212529;">

            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Disponibilidad</th>
                    <th>Descripcion</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $car)
                <tr>
                    <td>{{ $loop->index + $services->firstItem() }}</td>
                    <td>#{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->type }}</td>
                    <td>{{ $car->disponibility }}</td>
                    <td>{{ $car->desc ? 'Sí' : 'No' }}</td>
                    <td>{{ $car->img ? 'Sí' : 'No' }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Accion a realizar
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Agregar</a></li>
                                <li><a class="dropdown-item" href="#">Modificar</a></li>
                                <li><a class="dropdown-item" href="#">Eliminar </a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" class="ulpgcds-pager" >
                        {{-- Enlaces de paginación --}}
                        {{ $services->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div> 
</main>
@endsection
