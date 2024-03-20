@extends('layouts.panel')

@section('title', 'Brands-Admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Marcas
        </h1>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <ol class="breadcrumb mb-4">
            <div class="text-center">
                <button type="button" class="btn btn-success" onclick="openPopup()">Añadir Marcas</button>
            </div>
        </ol>
        <div class="row">
            @foreach($brands as $brand)
            <div class="col-xl-3 col-md-6">
                <div class="card mb-4" style="border: 2px solid {{ $loop->index % 2 == 0 ? '#2A6376' : '#ECB347' }};">
                    <img src="{{ asset('image/Marcas/' . $brand->logo) }}" class="marca-img" alt="{{ $brand->name }}" style="background-color: transparent;">
                    <div class="texto" style="background-color: {{ $loop->index % 2 == 0 ? '#2A6376' : '#ECB347' }}; color: {{ $loop->index % 2 == 0 ? '#FFFFFF' : '#000000' }};">
                        <h5 class="card-title">{{ $brand->name }}
                            <span class="crud-icons" style="float: right; display: flex; align-items: center;">
                                <a href="{{ route('brand-edit', ['id' => $brand->id]) }}" style="color: inherit; text-decoration: none; margin-left: 10px;"><i class="fas fa-edit"></i></a>
                                @auth
                                    @if(auth()->user()->level_id == 3)
                                        <form action="{{ route('brand-delete', ['id' => $brand->id]) }}" method="post" style="margin-left: 10px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border: none; cursor: pointer; color: inherit;"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
                                @endauth
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
<!-- Modal para añadir marca -->
<div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Registro de nueva marca</h5>
                
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('brand-store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Selecciona una categoría</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                        <button type="button" class="btn btn-secondary" onclick="closePopup()">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Script para abrir la ventana emergente -->
<script>
    function openPopup() {
        $('#addBrandModal').modal('show');
    }

    function closePopup() {
        $('#addBrandModal').modal('hide');
    }
</script>

<footer>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6">
                <p style="color: rgb(127, 124, 124)">
                    Mostrando {{ $brands->firstItem() }} a {{ $brands->lastItem() }} de {{ $brands->total() }} resultados
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-end ulpgcds-pager">
                {{ $brands->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</footer>
@endsection
