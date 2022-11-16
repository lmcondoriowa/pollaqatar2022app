@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between">
    <h1>Grupos</h1>
    <div>
        <a href="/grupo/nuevo" class="btn btn-primary">Nuevo</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Nombre</th>
            <th>Id</th>
            <th>Estado</th>
            <th>Fecha Registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($grupos as $fila)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $fila->nombre }}</td>
            <td>{{ $fila->id }}</td>
            <td>{{ $fila->estado }}</td>
            <td>{{ $fila->created_at }}</td>
            <td>
                <a href="/grupo/mostrar/{{$fila->id}}" class="btn btn-info">Editar</a>
                <a href="/grupo/eliminar/{{$fila->id}}"
                    onclick="return confirm('¿Estas seguro de eliminar este registro?')"
                    class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection