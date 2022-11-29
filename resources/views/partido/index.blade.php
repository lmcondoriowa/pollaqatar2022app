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
				@auth
				<th>Acciones</th>
				@endauth
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
				<th>{{ $item->valoracion }}</th>
				<th>{{ $item->estado }}</th>
				@auth
				<th>
					<a href="/partidos/detalle/{{ $item->id }}" class="btn btn-info">Editar</a>
					<a href="/partidos/eliminar/{{ $item->id }}" class="btn btn-danger">Eliminar</a>
				</th>
				@endauth
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection