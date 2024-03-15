@extends('layouts.panel')

@section('title', 'Admins-Admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Gestión de Personal</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Ver Administradores</h5>
                        <p class="card-text">Haz clic para ver todos los administradores.</p>
                        <button id="adminsButton" class="btn btn-primary"><i class="fas fa-users"></i> Ver Administradores</button>
                    </div>
                </div>
                <div id="adminsSection" style="display: none;">
                    @foreach($adminUsers as $adminUser)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $adminUser->name }}</h5>
                            <p class="card-text">Puesto {{ $adminUser->level->name }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="adminsSection" style="display: none;">
                    @foreach($admins as $admin)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $admin->name }}</h5>
                            <p class="card-text">{{ $admin->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Ver Empleados</h5>
                        <p class="card-text">Haz clic para ver todos los empleados.</p>
                        <button id="employeesButton" class="btn btn-primary"><i class="fas fa-users"></i> Ver Empleados</button>
                    </div>
                </div>
                <div id="employeesSection" style="display: none;">
                    @foreach($employeeUsers as $employeeUser)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $employeeUser->name }}</h5>
                            <p class="card-text">{{ $employeeUser->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="employeesSection" style="display: none;">
                    @foreach($employees as $employee)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $employee->name }}</h5>
                            <p class="card-text">{{ $employee->email }}</p>
                        </div>
                    </div>
                    @endforeach
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

@endsection
