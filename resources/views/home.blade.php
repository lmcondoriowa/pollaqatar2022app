@extends('layouts.app')

@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="card mb-4">
	<div class="card-header">
		<i class="fas fa-table me-1"></i>
		Rnaking
	</div>
	<div class="card-body">
		<table id="datatablesSimple">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Puntaje</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nombre</th>
					<th>Puntaje</th>
				</tr>
			</tfoot>
			<tbody>
				@foreach($puntajes as $item)
				<tr>
					<td>{{ $item->cartillas_descripcion }}</td>
					<td>{{ $item->total_puntaje }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-xl-6">
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-chart-area me-1"></i>
				Area Chart Example
			</div>
			<div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
		</div>
	</div>
	<div class="col-xl-6">
		<div class="card mb-4">
			<div class="card-header">
				<i class="fas fa-chart-bar me-1"></i>
				Bar Chart Example
			</div>
			<div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
		</div>
	</div>
</div>

@endsection