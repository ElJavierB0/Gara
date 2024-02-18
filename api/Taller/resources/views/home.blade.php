@extends('layouts.main')

@section('title', 'Landing Page')

@section('content')
    <section id="servicios" class="container-fluid section-container">
        <!-- Sección 1 -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image-container2">
                    <img src="{{ asset('image/A5.jpg') }}" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="text-container2">
                    <h5>Servicios</h5>
                    <p>• Cambio de aceite y filtro.</p>
                    <p>• Inspección y reemplazo de bujías.</p>
                    <p>• Alineación de ruedas.</p>
                    <p>• Rotación de neumáticos.</p>
                    <p>• Cambio de líquidos (frenos, transmisión, refrigerante).</p>
                    <p>• Inspección y reemplazo de correas y mangueras.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="reparaciones" class="container-fluid section-container2">
        <!-- Sección 2 -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image-container2">
                    <img src="{{ asset('image/Taller.jpeg') }}" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="text-container3">
                    <h5>Reparaciones</h5>
                    <p>• Diagnóstico y reparación de problemas de motor.</p>
                    <p>• Reparación de sistemas de frenos y suspensión.</p>          
                    <p>• Servicios de transmisión y embrague.</p>           
                    <p>• Reparación y recarga del sistema de aire acondicionado.</p>
                    <p>• Solución de problemas eléctricos y reparación de sistemas de iluminación.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="modificaciones" class="container-fluid section-container">
        <!-- Sección 3 -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image-container2">
                    <img src="{{ asset('image/M1.jpg') }}" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="text-container2">
                    <h5>Modificaciones</h5>
                    <p>• Instalación de sistemas de escape personalizados.</p>
                    <p>• Mejoras en la admisión de aire.</p>          
                    <p>• Modificaciones de suspensión para un manejo mejorado.</p>           
                    <p>• Instalación de sistemas de sonido y entretenimiento.</p>
                    <p>• Personalización de llantas y neumáticos.</p>
                    <p>• Actualizaciones de rendimiento del motor.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
