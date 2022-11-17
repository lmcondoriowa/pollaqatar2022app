@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
            <li class="breadcrumb-item"><a href="/paises">Paises</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between">
        <h1>Editar Pais</h1>
        <div>
            <a href="/paises" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
    <form action="/paises/editar" class="col-lg-6" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$pais->id}}" />
        <div class="mb-3 row">
            <label for="inputGrupo" class="col-sm-2 col-form-label">Grupo</label>
            <div class="col-sm-10">
                <select name="grupo" class="form-select" id="inputGrupo" required>
                    <option value="">Seleccione una opción</option>
                    @foreach($grupos as $item)
                    <option value="{{ $item->id }}" @selected($item->id==$pais->grupo_id) >{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" class="form-control" id="inputNombre" value="{{$pais->nombre}}"
                    required />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputBandera" class="col-sm-2 col-form-label">Bandera</label>
            <div class="col-sm-10">
                <input type="file" name="bandera" class="form-control" accept="image/*" id="inputBandera" />
            </div>
        </div>
        <input type="hidden" name="banderaActual" value="{{$pais->bandera}}" />
        <div class="mb-3 row">
            <label for="inputEstado" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select name="estado" class="form-select" id="inputEstado" required>
                    <option value="">Seleccione una opción</option>
                    <option value="A" @selected('A'==$pais->estado)>Activo</option>
                    <option value="I" @selected('I'==$pais->estado)>Inactivo</option>
                </select>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection