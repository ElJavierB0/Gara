@extends('layouts.panel')

@section('title', 'Editar Usuario')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <a href="{{ route('user') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Editar Usuario
        </h1>

        <div class="row">
            <!-- Card Body para la Información del Usuario -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Información del Usuario
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user-update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="surname" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Card Body para la Contraseña y otros Campos Relacionados -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Contraseña y Otros Campos
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{ route('user-update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactivo</option>
                                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="level_id" class="form-label">Nivel</label>
                                    <select class="form-select" id="level_id" name="level_id">
                                        <option value="1" {{ $user->level_id == 1 ? 'selected' : '' }}>Usuario</option>
                                        <option value="2" {{ $user->level_id == 2 ? 'selected' : '' }}>Empleado</option>
                                        <option value="3" {{ $user->level_id == 3 ? 'selected' : '' }}>Administrador</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
