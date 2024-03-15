@extends('layouts.panel')

@section('title', 'Remplacements-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Refacciones
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $remplacements->count() }}</b> resultados
                    de un total de <b>{{ $remplacements->total() }}</b>
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
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($remplacements as $remplacement)
                <tr>
                    <td>{{ $loop->index + $remplacements->firstItem() }}</td>
                    <td>#{{ $remplacement->id }}</td>
                    <td>{{ $remplacement->name }}</td>
                    <td>{{ $remplacement->type }}</td>
                    <td>{{ $remplacement->description ? 'Sí tiene' : 'No tiene' }}</td>
                    <td>${{ $remplacement->price }}</td>
                    <td>{{ $remplacement->img ? 'Sí' : 'No' }}</td>

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
                    <td colspan="8" class="ulpgcds-pager">
                        {{-- Enlaces de paginación --}}
                        {{ $remplacements->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div> 
</main>
@endsection
