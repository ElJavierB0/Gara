@extends('layouts.panel')

@section('title', 'Brands-Admin')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4" >
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Marcas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Lista de marcas.
            </li>
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $brands->count() }}</b> resultados
                    de un total de <b>{{ $brands->total() }}</b>
                </div></li>
        </ol>
        <div class="row">
            @foreach($brands as $brand)
                    <div class="col-xl-3 col-md-6">
                        <div class="card mb-4" style="border: 2px solid {{ $loop->index % 2 == 0 ? '#2A6376' : '#ECB347' }};">
                            <img src="{{ asset('image/Marcas/' . $brand->logo) }}" class="marca-img" alt="{{ $brand->name }}" style="background-color: transparent;">
                            <div class="texto" style="background-color: {{ $loop->index % 2 == 0 ? '#2A6376' : '#ECB347' }}; color: {{ $loop->index % 2 == 0 ? '#FFFFFF' : '#000000' }};">
                                <h5 class="card-title">{{ $brand->name }}
                                    <span class="crud-icons" style="float: right; display: flex; align-items: center;">
                                        <a href="{{ route('brand/edit', ['id' => $brand->id]) }}" style="color: inherit; text-decoration: none; margin-left: 10px;"><i class="fas fa-edit"></i></a>
                                        <form action="" method="post" style="margin-left: 10px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background: none; border: none; cursor: pointer; color: inherit;"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </span>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</main>
<footer>
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-6">
                <p style="color: rgb(127, 124, 124)">
                    Showing {{ $brands->firstItem() }} to {{ $brands->lastItem() }} of {{ $brands->total() }} results
                </p>
            </div>
            <div class="col-md-6 d-flex justify-content-end ulpgcds-pager">
                {{ $brands->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</footer>
@endsection
