@extends('layouts.panel')

@section('title', 'Category-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Categorías
        </h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $categories->count() }}</b> resultados
                    de un total de <b>{{ $categories->total() }}</b>
                </div>
            </li>
        </ol>
        
        <div class="mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fas fa-plus"></i> Añadir Categoría</button>
        </div>

        <table class="table table-hover" style="border: 2px solid #212529; color: #212529;">

            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Detalles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->index + $categories->firstItem() }}</td>
                    <td>#{{ $category->id }}</td>
                    <td>{{ $category->type }}</td>
                    <td>
                        @if ($category->details) <!-- Verificar si hay descripción -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $category->id }}"><i class="fas fa-eye"></i></button>
                        @else
                            No tiene
                        @endif                    
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('category-edit', $category->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            @auth
                                @if(auth()->user()->level_id == 3)
                                <form action="{{ route('category-delete', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>                            
                                @endif
                            @endauth
                        </div>
                    </td>
                </tr>

                <!-- Modal para mostrar detalles -->
                <div class="modal fade" id="detailsModal{{ $category->id }}" tabindex="-1" aria-labelledby="detailsModal{{ $category->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailsModal{{ $category->id }}Label">Detalles de la Categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $category->details }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="ulpgcds-pager">
                        {{-- Enlaces de paginación --}}
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div> 
</main>

<!-- Modal para agregar categoría -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Añadir Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar categoría -->
                <form action="{{ route('category-store') }}" method="POST">
                    @csrf
                    <!-- Campos del formulario -->
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <input type="text" class="form-control" id="type" name="type" required>
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Detalles</label>
                        <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
