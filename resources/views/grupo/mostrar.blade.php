@extends('layouts.app')

@section('content')
<div class="border-bottom mt-3 mb-5 d-flex justify-content-between">
    <h1>Editar Grupo</h1>
    <div>
        <a href="/grupos" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="row">
    <form method="post" action="/grupo/editar" class="col col-lg-6">
        @csrf
        <input type="hidden" name="id" value="{{ $grupo->id }}" />
        <div class="mb-3 row">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" id="inputNombre" name="nombre" value="{{ $grupo->nombre }}" class="form-control"
                    required />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputEstado" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select id="inputEstado" name="estado" class="form-select" required>
                    <option value="">Selecciona una opción</option>
                    <option {{ $grupo->estado=='A' ? 'selected' : '' }} value="A">Activo</option>
                    <option {{ $grupo->estado=='I' ? 'selected' : '' }} value="I">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection