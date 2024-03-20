@extends('layouts.panel')

@section('title', 'Usuarios')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Gestion de Usuarios
        </h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-3">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAgregar"><i class="fas fa-plus"></i> Añadir Usuario</button>
        </div>

        <table class="table table-hover" style="border: 2px solid #212529; color: #212529;">

            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Nivel</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->index + $users->firstItem() }}</td>
                    <td>#{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                    <td>{{ $user->level->name }}</td>
                    <td>
                        @if ($user->imagen)
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalFoto{{ $user->id }}"><i class="fas fa-image"></i></a>
                        <!-- Modal para ver la foto -->
                        <div class="modal fade" id="exampleModalFoto{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabelFoto{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabelFoto{{ $user->id }}">Foto de {{ $user->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('image/Usuarios/' . $user->imagen) }}" alt="Foto de usuario" class="custom-images" width="150%">
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
                            <a href="{{ route('user-edit', $user->id) }}" class="btn btn-primary" role="button"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('user-delete', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" class="ulpgcds-pager">
                        {{-- Enlaces de paginación --}}
                        {{ $users->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</main>

<<!-- Modal para agregar usuario -->
<div class="modal fade" id="exampleModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabelAgregar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelAgregar">Agregar Nuevo Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="surname" name="surname"> <!-- Cambiado a 'apellido' -->
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Celular</label>
                        <input type="numeric" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
