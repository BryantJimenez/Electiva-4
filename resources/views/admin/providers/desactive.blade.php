@extends('layouts.admin')

@section('title', 'Lista de Proveedores')
@section('page-title', 'Lista de Proveedores')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Proveedores Desactivados</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<a href="{{ route('proveedores.index') }}"><button type="button" class="btn btn-success">Proveedores Activos</button></a>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Teléfono</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($providers as $provider)
							<tr>
								<td>{{ $num++ }}</td>
								<td>{{ $provider->name }}</td>
								<td>{{ $provider->phone }}</td>
								<td>{!! userType($provider->type) !!}</td>
								<td>{!! userState($provider->state) !!}</td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="{{ route('proveedores.show', ['slug' => $provider->slug]) }}" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="{{ route('proveedores.edit', ['slug' => $provider->slug]) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									@if($provider->state==0)
									<button class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="activateProvider('{{ $provider->slug }}')"><i class="fa fa-check"></i></button>
									@else
									<button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" onclick="deactivateProvider('{{ $provider->slug }}')"><i class="fa fa-history"></i></button>
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
</div>

{{-- Activar y desactivar proveedores --}}


<div class="modal fade" id="activateProvider" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este proveedor?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formActivateProvider">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Activar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

{{-- Activar y desactivar proveedores --}}

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
@endsection