@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Nuevo Partido</h1>
        <div>
            <a href="/partidos" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
    <form action="/partidos/guardar" class="col-lg-6" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="inputFechaPartido" class="col-sm-2 col-form-label">Fecha partido</label>
            <div class="col-sm-10">
                <input type="datetime-local" name="fecha_partido" class="form-control" id="inputFechaPartido" min="1" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPaisLocal" class="col-sm-2 col-form-label">Local</label>
            <div class="col-sm-10">
                <select name="pais_local" class="form-select" id="inputPaisLocal" required>
                    <option value="">Seleccione una opción</option>
                    @foreach($pais_locales as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <div class="mb-4 row">
                    <label for="inputLocalGoal" class="col-sm-4 col-form-label">Local Gol</label>
                    <div class="col-sm-8">
                        <input type="number" name="local_goal" class="form-control" id="inputLocalGoal" min="0" />
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 row">
                    <label for="inputVisitanteGoal" class="col-sm-4 col-form-label">Visitante Gol</label>
                    <div class="col-sm-8">
                        <input type="number" name="visitante_goal" class="form-control" id="inputVisitanteGoal"
                            min="0" />
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPaisVisitante" class="col-sm-2 col-form-label">Visitante</label>
            <div class="col-sm-10">
                <select name="pais_visitante" class="form-select" id="inputPaisVisitante" required>
                    <option value="">Seleccione una opción</option>
                    @foreach($pais_visitantes as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection