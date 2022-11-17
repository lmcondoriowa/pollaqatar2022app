@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Nuevo Pais</h1>
        <div>
            <a href="/paises" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
    <form action="/paises/guardar" class="col-lg-6" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputGrupo" class="col-sm-2 col-form-label">Grupo</label>
            <div class="col-sm-10">
                <select name="grupo" class="form-select" id="inputGrupo" required>
                    <option value="">Seleccione una opción</option>
                    @foreach($grupos as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="nombre" class="form-control" id="inputNombre" required />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputBandera" class="col-sm-2 col-form-label">Bandera</label>
            <div class="col-sm-10">
                <input type="file" name="bandera" class="form-control" accept="image/*" id="inputBandera" />
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection