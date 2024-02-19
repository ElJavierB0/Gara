@extends('layouts.panel')

@section('title', 'Cars-Admin')

@section('side')

@endsection

@section('content')
<main>
    <div class="container mt-3">
        <h2>Autos</h2>
        <p>Lista detallada de los autos con:</p>
        <p>•Nombre <br>
            •Estado (Al momento del registro) <br>
            •Foto (Al momento del registro) <br>
            •Marca y Modelo (Si se tiene registrado)
        </p>
        <table class="table table-dark table-hover">
        <thead>
            <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Foto</th>
            <th>Marca</th>
            <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
            <td>john@example.com</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Accion a realizar
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Agregar</a></li>
                        <li><a class="dropdown-item" href="#">Modificar</a></li>
                        <li><a class="dropdown-item" href="#">Eliminar </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>
            </td>
            </tr>
            <tr>
            <td>Mary</td>
            <td>Moe</td>
            <td>mary@example.com</td>
            <td>mary@example.com</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Modificar</button>
                    <button type="button" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </td>
            </tr>
            <tr>
            <td>July</td>
            <td>Dooley</td>
            <td>july@example.com</td>
            <td>july@example.com</td> 
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Modificar</button>
                    <button type="button" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </td> 
            </tr>
        </tbody>
        </table>
    </div> 
</main>
@endsection