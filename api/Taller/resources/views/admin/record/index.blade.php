@extends('layouts.panel')

@section('title', 'Records-Admin')

@section('content')
<main>
    <div class="container mt-3">
        <h1 class="mt-4">
            <a href="{{ route('admin') }}" style="color: #212529; text-decoration: none; margin-right: 10px;"><i class="fas fa-arrow-left"></i></a>
            Registros
        </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active" style="display: flex; align-items: center;">
                <div>
                    Mostrando <b>{{ $records->count() }}</b> resultados
                    de un total de <b>{{ $records->total() }}</b>
                </div>
            </li>
        </ol>
        
        <table class="table table-hover" style="border: 2px solid #212529; color: #212529;">
            <thead>
                <tr>
                    <th>Registro</th>
                    <th>Id</th>
                    <th>Empleado</th>
                    <th>Refaccion</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{ $loop->index + $records->firstItem() }}</td>
                        <td>#{{ $record->id }}</td>
                        <td>
                            @php
                                $found = false;
                            @endphp
                            @foreach($empleados as $empleado)
                                @if($empleado->id == $record->employee_id)
                                    {{ $empleado->name . ' ' . $empleado->surname }}
                                    @php
                                        $found = true;
                                    @endphp
                                    @break
                                @endif
                            @endforeach
                            @if(!$found)
                                N/E
                            @endif
                        </td>
                        
                        <td>{{ $record->remplacement->name ?? 'N/C' }}</td>
                        <td>{{ $record->service ? 'Sí' : 'No' }}</td>
                        <td>{{ $record->date }}</td>
                    </tr>
                    @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" class="ulpgcds-pager">
                        {{-- Enlaces de paginación --}}
                        {{ $records->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div> 
</main>
@endsection
