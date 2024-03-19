@extends('layouts.panel')

@section('title', 'Service-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Servicios
        </h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAgregar">Agregar Nuevo Servicio</button>
        </div>

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
                @foreach($services as $service)
                <tr>
                    <td>{{ $loop->index + $services->firstItem() }}</td>
                    <td>#{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->type }}</td>
                    <td>{{ $service->disponibility }}</td>
                    <td>
                        @if ($service->desc)
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#descModal{{ $service->id }}"><i class="fas fa-eye"></i></button>
                        @else
                            No tiene
                        @endif
                    </td>
                    <td>
                        @if ($service->img)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalFoto{{ $service->id }}"><i class="fas fa-image"></i></a>
                        <!-- Modal para ver la foto -->
                        <div class="modal fade" id="exampleModalFoto{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabelFoto{{ $service->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelFoto{{ $service->id }}">Foto de {{ $service->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('image/Servicios/' . $service->img) }}" alt="Foto de servicio" class="custom-images" width="150%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            No Tiene
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('service-edit', $service->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('service-delete', $service->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>                            
                        </div>
                    </td>
                    <!-- Modal para mostrar detalles -->
                <div class="modal fade" id="descModal{{ $service->id }}" tabindex="-1" aria-labelledby="descModal{{ $service->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="descModal{{ $service->id }}Label">Detalles de la Categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $service->desc }}</p>
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
                        {{ $services->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</main>

<!-- Modal para agregar servicio -->
<div class="modal fade" id="exampleModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabelAgregar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelAgregar">Agregar Nuevo Servicio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <select class="form-select" id="type" name="type">
                            <option value="Servicio">Servicio</option>
                            <option value="Reparacion">Reparación</option>
                            <option value="Modificacion">Modificación</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Descripción</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
