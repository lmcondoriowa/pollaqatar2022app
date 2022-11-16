@extends('layouts.app')

@section('content')
<div class="border-bottom mt-3 mb-5 d-flex justify-content-between">
    <h1>Nuevo Grupo</h1>
    <div>
        <a href="/grupos" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="row">
    <form method="post" action="/grupo/guardar" class="col col-lg-6">
        @csrf
        <div class="mb-3 row">
            <label for="inputNombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" id="inputNombre" name="nombre" class="form-control" required />
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection