@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Paises</h1>
        <div>
            <a href="/paises/nuevo" class="btn btn-primary">Nuevo</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Grupo</th>
                <th>Bandera</th>
                <th>Fecha Creación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paises as $item)
            <tr>
                <th>{{ $item->nombre }}</th>
                <th>{{ $item->grupo->nombre }}</th>
                <th><img src="{{ asset('storage/'.$item->bandera) }}"></th>

                <th>{{ $item->created_at }}</th>
                <th>{{ $item->estado }}</th>
                <th>
                    <a href="/paises/detalle/{{ $item->id }}" class="btn btn-info">Editar</a>
                    <a href="/paises/eliminar/{{ $item->id }}"
                        onclick="return confirm('¿Estás seguro de eliminar este registro?')"
                        class="btn btn-danger">Eliminar</a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection