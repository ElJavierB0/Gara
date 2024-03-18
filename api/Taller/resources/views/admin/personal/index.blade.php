@extends('layouts.panel')

@section('title', 'Admins-Admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Gestión de Personal</h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Ver Administradores</h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                Haz clic para ver los administradores.
                            </li>
                            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                                <div>
                                    Añadir Administradores
                                </div>
                            </li>
                        </ol>
                        <button id="adminsButton" class="btn btn-primary"><i class="fas fa-users"></i> Ver Administradores</button>
                        <button id="addadminButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal"><i class="fas fa-users"></i> Añadir Administradores</button>
                    </div>
                </div>
                
                <div id="adminsSection" style="display: none;">
                    @foreach($adminUsers as $adminUser)
                    <div class="card mb-4">
                        <div class="card-body">
                            @if($adminUser->id != auth()->user()->id) <!-- Verificar si el usuario no es el logueado -->
                            <a href="{{ route('edit', $adminUser->id) }}" class="float-end" style="margin-left: 10px;"><i class="fas fa-edit" style="color:#212529"></i></a>
                            <a href="{{ route('eliminar', $adminUser->id) }}" class="float-end delete-admin" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que quieres eliminar este administrador?')) { document.getElementById('deleteForm_{{ $adminUser->id }}').submit(); }">
                                <i class="fas fa-trash-alt" style="color: red;"></i>
                            </a>    
                                <form id="deleteForm_{{ $adminUser->id }}" action="{{ route('eliminar', $adminUser->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endif
                            <h5 class="card-title">{{ $adminUser->name }}</h5>
                            <p class="card-text">{{ $adminUser->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Modal para añadir administrador -->
            <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addAdminModalLabel">Añadir Administrador</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí va el formulario para añadir un nuevo administrador -->
                            <form action="{{ route('añadir-administrador') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <label for="surname">Apellido:</label>
                                    <input type="text" class="form-control" id="surname" name="surname">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                    <label for="phone">Celular:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="image">Imagen:</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Ver Empleados</h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                Haz clic para ver los Empleados.
                            </li>
                            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                                <div>
                                    Añadir Empleados
                                </div>
                            </li>
                        </ol>
                        <button id="employeesButton" class="btn btn-primary"><i class="fas fa-users"></i> Ver Empleados</button>
                        <button id="addemployeesButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fas fa-users"></i> Añadir Empleados</button>
                    </div>
                </div>
                <div id="employeesSection" style="display: none;">
                    @foreach($employeeUsers as $employeeUser)
                    <div class="card mb-4">
                        <div class="card-body">
                            @if($employeeUser->id != auth()->user()->id) <!-- Verificar si el usuario no es el logueado -->
                                <a href="{{ route('edit', $employeeUser->id) }}" class="float-end" style="margin-left: 10px;"><i class="fas fa-edit" style="color:#212529"></i></a>
                                <a href="{{ route('eliminar', $employeeUser->id) }}" class="float-end delete-admin" onclick="event.preventDefault(); if(confirm('¿Estás seguro de que quieres eliminar este Empleado?')) { document.getElementById('deleteForm_{{ $employeeUser->id }}').submit(); }">
                                    <i class="fas fa-trash-alt" style="color: red;"></i>
                                </a>    
                                    <form id="deleteForm_{{ $employeeUser->id }}" action="{{ route('eliminar', $employeeUser->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                            @endif
                            <h5 class="card-title">{{ $employeeUser->name }}</h5>
                            <p class="card-text">{{ $employeeUser->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUserModalLabel">Añadir Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Aquí va el formulario para añadir un nuevo usuario -->
                            <form action="{{ route('añadir-empleado') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Nombre:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <label for="surname">Apellido:</label>
                                    <input type="text" class="form-control" id="surname" name="surname">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                    <label for="phone">Celular:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <label for="image">Imagen:</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</main>


<script>
    // JavaScript para controlar la visibilidad de las listas al hacer clic en los botones
    document.addEventListener("DOMContentLoaded", function() {
        const adminsButton = document.getElementById("adminsButton");
        const employeesButton = document.getElementById("employeesButton");
        const adminsSection = document.getElementById("adminsSection");
        const employeesSection = document.getElementById("employeesSection");

        adminsButton.addEventListener("click", function() {
            if (adminsSection.style.display === "none") {
                adminsSection.style.display = "block";
            } else {
                adminsSection.style.display = "none";
            }
        });

        employeesButton.addEventListener("click", function() {
            if (employeesSection.style.display === "none") {
                employeesSection.style.display = "block";
            } else {
                employeesSection.style.display = "none";
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Evento clic para cada enlace de edición de administrador
        @foreach($adminUsers as $adminUser)
        document.getElementById("editAdmin_{{ $adminUser->id }}").addEventListener("click", function(event) {
            event.preventDefault();
            // Aquí puedes agregar el código para manejar el clic en el enlace de edición de administrador
            // Por ejemplo, puedes redirigir al usuario a la página de edición
            window.location.href = "{{ route('edit', $adminUser->id) }}";
        });
        @endforeach

        // Evento clic para cada enlace de edición de empleado
        @foreach($employeeUsers as $employeeUser)
        document.getElementById("editEmployee_{{ $employeeUser->id }}").addEventListener("click", function(event) {
            event.preventDefault();
            // Aquí puedes agregar el código para manejar el clic en el enlace de edición de empleado
            // Por ejemplo, puedes redirigir al usuario a la página de edición
            window.location.href = "{{ route('edit', $employeeUser->id) }}";
        });
        @endforeach
    });
</script>


@endsection

