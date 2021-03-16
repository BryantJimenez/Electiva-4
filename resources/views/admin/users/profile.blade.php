@extends('layouts.admin')

@section('title', 'Perfil')
@section('page-title', 'Perfil')

@section('breadcrumb')
<li class="breadcrumb-item">Perfil</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body little-profile text-center">
				<div class="pro-img m-t-20"><img src="{{ asset('/admins/img/users/'.Auth::user()->photo) }}" alt="user"></div>
				<h3 class="m-b-0">{{ Auth::user()->name.' '.Auth::user()->lastname }}</h3>
				<h6 class="text-muted">@if(Auth::user()->type==1) 'Administrador' @elseif(Auth::user()->type==2) 'Trabajador' @else 'Trabajador' @endif</h6>
			</div>
			<div class="text-center bg-light">
				<div class="row">
					<div class="col-6  p-20 b-r">
						<h4 class="m-b-0 font-medium">{{ Auth::user()->email }}</h4><small><b>Correo Electrónico</b></small>
					</div>

					<div class="col-6  p-20">
						<h4 class="m-b-0 font-medium">{{ Auth::user()->phone }}</h4><small><b>Teléfono</b></small>
					</div>

					<div class="col-6  p-20 b-r">
						<h4 class="m-b-0 font-medium">{{ Auth::user()->country->name }}</h4><small><b>País de Procedencia</b></small>
					</div>

					<div class="col-6  p-20">
						<h4 class="m-b-0 font-medium">{{ Auth::user()->district->name }}</h4><small><b>Barrio</b></small>
					</div>

					<div class="col-6  p-20 b-r">
						<h4 class="m-b-0 font-medium">{{ Auth::user()->dni }}</h4><small><b>Género</b></small>
					</div>

					<div class="col-6  p-20">
						<h4 class="m-b-0 font-medium">{{ Auth::user()->address}}</h4><small><b>Dirección</b></small>
					</div>

				</div>
			</div>
		</div>
	</div>

	@if(count(Auth::user()->vehicles)>0)
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>Vehículos del cliente</h3>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Dominio</th>
								<th>Marca/Modelo/Versión</th>
								<th>Año</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach(Auth::user()->vehicles as $vehicle)
							<tr>
								<td>{{ $num++ }}</td>
								<td>{{ $vehicle->domine }}</td>
								<td>{{ $vehicle->version->model->brand->name." - ".$vehicle->version->model->name." - ".$vehicle->version->name }}</td>
								<td>{{ $vehicle->year }}</td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" href="{{ route('vehiculos.show', ['slug' => $vehicle->slug]) }}"><i class="fa fa-car"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" href="{{ route('vehiculos.edit', ['slug' => $vehicle->slug]) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									@if(count($vehicle->budgets)==0)
									<button class="btn btn-danger btn-circle btn-sm" onclick="deleteVehicle('{{ $vehicle->slug }}')"><i class="fa fa-trash"></i></button>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endif

	@if(count(Auth::user()->budgets)>0)
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>Presupuestos y trabajos del cliente</h3>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Dominio</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Total</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach(Auth::user()->budgets as $budget)
							<tr>
								<td>{{ $num2++ }}</td>
								<td>{{ $budget->vehicle->domine }}</td>
								<td><span class="badge badge-dark">@if($budget->work) Trabajo @else Presupuesto @endif</span></td>
								<td>@if($budget->work) {!! workState($budget->work->state) !!} @else <span class="badge badge-success">Activo</span> @endif</td>
								<td>{{ number_format($budget->total, 2, ',', '.') }}</td>
								<td class="d-flex mr-0">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="{{ route('presupuestos.show', ['slug' => $budget->slug]) }}"><i class="mdi mdi-file"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="{{ route('presupuestos.edit', ['slug' => $budget->slug]) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<a class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="PDF" href="{{ route('presupuestos.pdf', ['slug' => $budget->slug]) }}" target="_blank"><i class="mdi mdi-file-pdf"></i></a>&nbsp;&nbsp;
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="card-body text-center">
		<a href="{{ route('perfil.update') }}" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-success btn-md btn-rounded">Modificar</a>
	</div>
</div>

@endsection