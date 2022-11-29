@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item"><a href="/paises">Cartillas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between">
        <h1>Editar Cartilla</h1>
        <div>
            <a href="/cartillas/exportar/pdf/{{$cartilla->id}}" class="btn btn-danger" target="_blank">Descargar PDF</a>
            <a href="/cartillas" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
    <form action="/cartillas/editar" class="col-lg-6" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$cartilla->id}}" />
        <div class="mb-3 row">
            <label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
                <select name="user" class="form-select" id="inputUser" required>
                    <option value="">Seleccione una opción</option>
                    @foreach($users as $item)
                    <option value="{{ $item->id }}" @selected($item->id==$cartilla->user_id) >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputDescripción" class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-10">
                <input type="text" name="descripcion" class="form-control" id="inputDescripcion"
                    value="{{$cartilla->descripcion}}" required />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputEstado" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select name="estado" class="form-select" id="inputEstado" required>
                    <option value="">Seleccione una opción</option>
                    <option value="R" @selected('R'==$cartilla->estado)>Registrado</option>
                    <option value="P" @selected('P'==$cartilla->estado)>Pagado</option>
                </select>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection