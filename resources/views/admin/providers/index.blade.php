@extends('layouts.admin')

@section('title', 'Lista de Proveedores')
@section('page-title', 'Lista de Proveedores')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Proveedores</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		@include('admin.partials.errors')
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Proveedor</button> 
				<a href="{{ route('proveedores.desactivar') }}"><button type="button" class="btn btn-danger">Proveedores Desactivados</button></a>
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



{{-- //////////////////Modal de Registro de Proveedores///////////////////////// --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Proveedor</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('proveedores.store') }}" method="POST" class="form" id="formProvider">
					@csrf

					<div class="row">

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ingresar Nombre">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
								<input type="text" class="form-control" name="dni" value="{{ old('dni') }}" autocomplete="nope" placeholder="Ingresar DNI">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								<input type="email" name="email" class="form-control" value="{{ old('email') }}" value="email" autocomplete="nope" placeholder="Ingresar Email">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
								<input type="text" class="form-control" required name="phone" value="{{ old('phone') }}" autocomplete="nope" placeholder="Ingresar Teléfono">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
								<input type="text" class="form-control" required name="address" value="{{ old('address') }}" autocomplete="nope" placeholder="Ingresar Dirección">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-group (alias)"></i></div>
								<select class="form-control" value="{{ old('type') }}" required name="type">
									<option value="">Tipo de Proveedor</option>
									<option value="4">Proveedor Particular</option>
									<option value="5">Proveedor Empresarial</option>
								</select>
							</div>
						</div>


					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary"  action="provider">Guardar Proveedor</button>
					</div>
				</form>
			</div>	
		</div>
	</div>
</div>
<!-- /.modal -->

{{-- Activar y desactivar proveedores --}}

<div class="modal fade" id="deactivateProvider" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar este proveedor?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeactivateProvider">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Desactivar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

{{-- Activar y desactivar proveedores --}}

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
{{-- <script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script> --}}
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
@endsection