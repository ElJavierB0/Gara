@extends('layouts.panel')

@section('title', 'Remplacements-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Refacciones
        </h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAgregar"><i class="fas fa-plus"></i> Añadir Refacción</button>
        </div> 
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
                    <td>
                        @if ($remplacement->description)
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#descriptionModal{{ $remplacement->id }}"><i class="fas fa-eye"></i></button>
                        @else
                            No tiene
                        @endif
                    </td>
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
                            <a href="{{ route('remplacement-edit', $remplacement->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            @auth
                                @if(auth()->user()->level_id == 3)
                            <form action="{{ route('remplacement-delete', $remplacement->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form> 
                            @endif
                            @endauth                           
                        </div>
                    </td>
                    <!-- Modal para mostrar detalles -->
                <div class="modal fade" id="descriptionModal{{ $remplacement->id }}" tabindex="-1" aria-labelledby="descriptionModal{{ $remplacement->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="descriptionModal{{ $remplacement->id }}Label">Detalles de la Categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $remplacement->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
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

<!-- Modal para agregar refacción -->
<div class="modal fade" id="exampleModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabelAgregar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelAgregar">Agregar Nueva Refacción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('remplacement-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="img" name="img" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
