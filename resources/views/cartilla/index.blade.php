@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Géneros</h1>
    <div>
        <a href="/cartilla/nuevo" class="btn btn-primary">Nuevo</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Usuario</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartillas as $fila)
        <tr>
            <td>{{ $fila->id }}</td>
            <td>{{ $fila->user->name }}</td>
            <td>{{ $fila->descripcion }}</td>
            <td>{{ $fila->estado }}</td>
            <td>{{ $fila->created_at }}</td>
            <td>
                <a href="/cartilla/mostrar/{{$fila->id}}" class="btn btn-info">Editar</a>
                <a href="/cartilla/eliminar/{{$fila->id}}"
                    onclick="return confirm('¿Estas seguro de eliminar este registro?')"
                    class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection