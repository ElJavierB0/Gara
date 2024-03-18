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
                    <td>
                        @if ($remplacement->img)
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $remplacement->id }}"><i class="fas fa-image"></i></a>
                            <!-- Ventana modal -->
                            <div class="modal fade" id="exampleModal{{ $remplacement->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $remplacement->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Para centrar la ventana modal -->
                                    <div class="modal-content" style="aspect-ratio: 1/1; max-width: 50%;">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $remplacement->id }}">Foto de {{ $remplacement->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body justify-content-center text-center"> <!-- Para centrar el contenido horizontalmente -->
                                            <img src="{{ asset('image/Refacciones/' . $remplacement->img) }}" alt="Foto de perfil" class="custom-im" style="max-width: 100%; max-height: 100%;"> <!-- Se aplica un estilo para que la imagen se adapte al tamaño del contenedor -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            No
                        @endif
                    </td>
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
