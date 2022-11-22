@extends('layouts.app')

@section('content')
<div class="border-bottom mt-3 mb-5 d-flex justify-content-between">
    <h1>Nueva Cartilla</h1>
    <div>
        <a href="/cartillas" class="btn btn-primary">Regresar</a>
    </div>
</div>
<div class="row">
    <form method="post" action="/cartillas/guardar" class="col col-lg-6">
        @csrf
        <div class="mb-3 row">
            <label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
                <select name="user" class="form-select" id="inputUser" required>
                    <option value="">Seleccione una opción</option>
                    @foreach($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputDescripcion" class="col-sm-2 col-form-label">Descripcion</label>
            <div class="col-sm-10">
                <input type="text" id="inputDescripcion" name="descripcion" class="form-control" required />
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12-col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color: #A9D0F5">
                    <tr>
                        <th>Partido</th>
                        <th>Local</th>
                        <th>Local Gol</th>
                        <th>Visitante Gol</th>
                        <th>Visitante</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($partidos as $item)
                    <tr>
                        <td>
                            <input type="number" name="idpartido[]" class="form-control" id="inputId" min="0"
                                value="{{ $item->id }}" readonly />
                        </td>
                        <td>
                            <input type="hidden" name="pais_local_id[]" value="{{$item->pais_local_id}}" />
                            <input type="text" name="pais_local" class="form-control" id="inputPaisLocal" min="0"
                                value="{{ $item->pais_local->nombre }}" readonly />
                        </td>
                        <td>
                            <input type="number" name="local_goal[]" class="form-control" id="inputLocalGoal" min="0"
                                value="0" />
                        </td>
                        <td>
                            <input type="number" name="visitante_goal[]" class="form-control" id="inputVisitanteGoal"
                                min="0" value="0" />
                        </td>
                        <td>
                            <input type="hidden" name="pais_visitante_id[]" value="{{ $item->pais_visitante_id }}" />
                            <input type="text" name="pais_visitante" class="form-control" id="inputPaisVisitante"
                                min="0" value="{{ $item->pais_visitante->nombre }}" readonly />
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@endsection