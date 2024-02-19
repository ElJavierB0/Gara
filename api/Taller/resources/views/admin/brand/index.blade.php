@extends('layouts.panel')

@section('title', 'Brands-Admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Brands</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Lista de marcas que se manejan en el taller.</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/Japon.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Toyota.png') }}" class="marca-img" alt="Toyota">
                    <div class="texto">
                        <h5 class="card-title">Toyota</h5>
                        <p class="Tx">Toyota es conocida por su enfoque en la calidad, la eficiencia y la innovación en el diseño de vehículos.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/Japon.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Nissan.png') }}" class="marca-img" alt="Nissan">
                    <div class="texto2">
                        <h5 class="card-title">Nissan</h5>
                        <p class="Tx2">La marca ha sido pionera en tecnologías automotrices, especialmente en el ámbito de la electrificación.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/Japon.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Honda.png') }}" class="marca-img" alt="Honda">
                    <div class="texto">
                        <h5 class="card-title">Honda</h5>
                        <p class="Tx">Honda es conocida por producir una amplia gama de vehículos, desde automóviles hasta motocicletas y vehículos todo terreno. </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/Japon.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Subaru.png') }}" class="marca-img" alt="Subaru">
                    <div class="texto2">
                        <h5 class="card-title">Subaru</h5>
                        <p class="Tx2">Subaru es una marca de automóviles japonesa conocida por sus vehículos todo terreno, tracción en las cuatro ruedas y motores bóxer.</p>
                    </div>
                </div>
            </div>
            {{-- 4 --}}
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/Alemania.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Mercedes.png') }}" class="marca-img" alt="Mercedes">
                    <div class="texto">
                        <h5 class="card-title">Mercedes-Benz</h5>
                        <p class="Tx"> Mercedes-Benz es sinónimo de lujo, prestigio, alta gama con interiores lujosos y tecnologías avanzadas.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/Alemania.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Porshe.png') }}" class="marca-img" alt="Porshe">
                    <div class="texto2">
                        <h5 class="card-title">Porshe</h5>
                        <p class="Tx2">Porsche es conocida por fabricar vehículos deportivos de alto rendimiento brindando una experiencia de conducción deportiva.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/Alemania.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/BMW.png') }}" class="marca-img" alt="BMW">
                    <div class="texto">
                        <h5 class="card-title">BMW</h5>
                        <p class="Tx">BMW es conocida por su enfoque en la innovación tecnológica y el desarrollo en rendimiento y seguridad.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/Alemania.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Audi.png') }}" class="marca-img" alt="Audi">
                    <div class="texto2">
                        <h5 class="card-title">Audi</h5>
                        <p class="Tx2">Audi se destaca por su diseño moderno y atractivo, con una atención meticulosa a los detalles en sus vehículos.</p>
                    </div>
                </div>
            </div>
            {{-- 8 --}}
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/Alemania.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Volkswagen.png') }}" class="marca-img" alt="Volkswagen">
                    <div class="texto">
                        <h5 class="card-title">Volkswagen</h5>
                        <p class="Tx">La reputación de Volkswagen por la calidad y durabilidad de sus vehículos ha contribuido a su éxito a lo largo de los años.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/US.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Ford.png') }}" class="marca-img" alt="Ford">
                    <div class="texto2">
                        <h5 class="card-title">Ford</h5>
                        <p class="Tx2">Ford revolucionó la fabricación de automóviles al introducir la línea de montaje y la producción en serie en el siglo XX.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/US.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Chevrolet.png') }}" class="marca-img" alt="Chevrolet">
                    <div class="texto2">
                        <h5 class="card-title">Chevrolet</h5>
                        <p class="Tx2">Chevrolet ha incorporado sistemas de infoentretenimiento avanzados y asistentes de seguridad en algunos modelos.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/US.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Tesla.png') }}" class="marca-img" alt="Tesla">
                    <div class="texto">
                        <h5 class="card-title">Tesla</h5>
                        <p class="Tx">Tesla ha sido pionera en tecnologías de conducción autónoma con su sistema de asistencia IA llamado "Autopilot".</p>
                    </div>
                </div>
            </div>  
            {{-- 12 --}}
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/Italia.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Maserati.png') }}" class="marca-img" alt="Maserati">
                    <div class="texto2">
                        <h5 class="card-title">Maserati</h5>
                        <p class="Tx2">La marca ha sido pionera en tecnologías automotrices, especialmente en el ámbito de la electrificación.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/Italia.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Lamborghini.png') }}" class="marca-img" alt="Lamborghini">
                    <div class="texto">
                        <h5 class="card-title">Lamborghini</h5>
                        <p class="Tx">Toyota es conocida por su enfoque en la calidad, la eficiencia y la innovación en el diseño de vehículos.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/Italia.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Ferrari.png') }}" class="marca-img" alt="Ferrari">
                    <div class="texto2">
                        <h5 class="card-title">Ferrari</h5>
                        <p class="Tx2">La marca ha sido pionera en tecnologías automotrices, especialmente en el ámbito de la electrificación.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno mb-4">
                    <img src="{{ asset('image/Banderas/UK.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Rolls.png') }}" class="marca-img" alt="Rolls">
                    <div class="texto">
                        <h5 class="card-title">Rolls Royce</h5>
                        <p class="Tx">Rolls-Royce es una marca de automóviles reconocida por su excelencia en el diseño y el rendimiento de sus vehículos. </p>
                    </div>
                </div>
            </div>
            {{-- 16 --}}
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/UK.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Jaguar.png') }}" class="marca-img" alt="Jaguar">
                    <div class="texto2">
                        <h5 class="card-title">Jaguar</h5>
                        <p class="Tx2">Jaguar es una marca británica de automóviles de lujo y de alto rendimiento que forma parte del grupo Jaguar Land Rover.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/CS.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Kia.png') }}" class="marca-img" alt="Kia">
                    <div class="texto2">
                        <h5 class="card-title">Kia</h5>
                        <p class="Tx2"></p>
                    </div>
                </div>
            </div>         
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/CS.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Hyundai.png') }}" class="marca-img" alt="Hyundai">
                    <div class="texto2">
                        <h5 class="card-title">Hyundai</h5>
                        <p class="Tx2"></p>
                    </div>
                </div>
            </div> 
            <div class="col-xl-3 col-md-6">
                <div class="card contorno2 mb-4">
                    <img src="{{ asset('image/Banderas/Suecia.png') }}" class="bandera-img" alt="Bandera">
                    <img src="{{ asset('image/Marcas/Volvo.png') }}" class="marca-img" alt="Volvo">
                    <div class="texto2">
                        <h5 class="card-title">Volvo</h5>
                        <p class="Tx2"></p>
                    </div>
                </div>
            </div> 
        </div>
        {{-- 20 --}}
    </div>
</main>
@endsection