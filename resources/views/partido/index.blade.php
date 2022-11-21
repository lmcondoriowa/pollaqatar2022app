@extends('layouts.app')

@section('content')
<div class="container">
	<div class="d-flex justify-content-between">
		<h1>Partidos</h1>
		<div>
			<a href="/partidos/nuevo" class="btn btn-primary">Nuevo</a>
		</div>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Local</th>
				<th>Gol</th>
				<th>Gol</th>
				<th>Visitante</th>
				<th>Fecha Partido</th>
				<th>Valoración</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($partidos as $item)
			<tr>
				<th>{{ $item->id }}</th>
				<th>{{ $item->pais_local->nombre }}</th>
				<th>{{ $item->local_goal }}</th>
				<th>{{ $item->visitante_goal }}</th>
				<th>{{ $item->pais_visitante->nombre }}</th>
				<th>{{ $item->fecha_partido }}</th>
				<th>{{ $item->valoración }}</th>
				<th>{{ $item->estado }}</th>
				<th>
					<a href="/partidos/detalle/{{ $item->id }}" class="btn btn-info">Editar</a>
					<a href="/partidos/eliminar/{{ $item->id }}" class="btn btn-danger">Eliminar</a>
				</th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection