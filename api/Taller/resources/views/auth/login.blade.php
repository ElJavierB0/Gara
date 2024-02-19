@extends('layouts.main')

@section('title', 'Login')

@section('menu')
<body>
    <!-- Barra de Navegación -->
    <nav id= "menu" class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('image/GT.png') }}" class="images" alt="..." height="36">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                        Trabajos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#servicios">Servicios</a></li>
                        <li><a class="dropdown-item" href="#reparaciones">Reparaciones</a></li>
                        <li><a class="dropdown-item" href="#modificaciones">Modificaciones</a></li>
                    </ul>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}#contacto">Contactanos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Accout</a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                data-bs-toggle="dropdown" aria-expanded="false">
                Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('admin')}}">Login</a></li>
                <li><a class="dropdown-item" href="{{route('admin')}}">Registro</a></li>
            </ul> --}}
                </ul>
            </div>
        </div>
    </nav>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6 text-black">
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                <form style="width: 23rem;">
                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login</h3>
        
                    <div class="form-outline mb-4">
                    <input type="email" id="form2Example18" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example18">Email</label>
                    </div>
        
                    <div class="form-outline mb-4">
                    <input type="password" id="form2Example28" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example28">Password</label>
                    </div>
        
                    <div class="pt-1 mb-4">
                    <a class="btn btn-info btn-lg btn-block" href="{{ route('admin') }}">Login</a>

                    </div>
        
                    <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                    <p>No cuentas con cuenta? <a href="{{ route('register') }}" style="color: #000;" class="as" >Register here</a></p>
        
                </form>
        
                </div>
        
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
                alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
            </div>
        </div>
        </section>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
@endsection
