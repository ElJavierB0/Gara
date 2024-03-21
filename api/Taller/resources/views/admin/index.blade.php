@extends('layouts.panel')

@section('title', 'Panel Admin')

@section('content')
<main >
    <div class="container-fluid px-4">
        <h1 class="mt-4" style="color: #212529">Bienvenido 
        @auth
            {{ auth()->user()->name }}
        @endauth
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">{{auth()->user()->level->name }}</li>
        </ol>
        @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Marcas</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('brand') }}">Ver Marcas</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">Autos</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('car') }}">Ver Carros</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Servicios</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('service') }}">Ver Servicios</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning  text-white mb-4">
                    <div class="card-body">Categorias</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('category') }}">Ver Categorias</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Refacciones</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('remplacement') }}">Ver Refacciones</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-tag me-1"></i>
                        Marcas más usadas
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($marcasMasUsadas as $marca)
                                <li class="list-group">{{ $marca->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-exclamation me-1"></i>
                        Servicio más demandado
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($serviciosMasDemandados as $servicio)
                                <li class="list-group">{{ $servicio->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection