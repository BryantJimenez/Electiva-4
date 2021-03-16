@extends('layouts.admin')

@section('title', 'Lista de Usuarios')
@section('page-title', 'Lista de Usuarios')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Usuarios</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		@include('admin.partials.errors')
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Usuario</button>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre Completo</th>
								<th>Usuario</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{ $num++ }}</td>
								<td>
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='{{ asset('/admins/img/users/'.$user->photo) }}' style='width: 150px; height: 150px;' ><br><b>{{ $user->name}}</b>"><img src="{{ asset('/admins/img/users/'.$user->photo) }}" class="img-circle" alt="Foto de perfil" width="40" height="40" /> {{ $user->name }}</a>
									</span>
								</td>
								<td>{{ $user->user == NULL ? 'N/T' : $user->user }}</td>
								<td>{!! userType($user->type) !!}</td>
								<td>{!! userState($user->state) !!}</td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="{{ route('usuarios.show', ['slug' => $user->slug]) }}" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="{{ route('usuarios.edit', ['slug' => $user->slug]) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									@if($user->state==0)
									<button class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="activateUser('{{ $user->slug }}')"><i class="fa fa-check"></i></button>
									@else
									<button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" onclick="deactivateUser('{{ $user->slug }}')"><i class="fa fa-history"></i></button>
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

<div class="modal fade" id="deactivateUser" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar este usuario?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeactivateUser">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Desactivar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="activateUser" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este usuario?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formActivateUser">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Activar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

{{-- //////////////////Modal de Registro de Usuarios///////////////////////// --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Usuario</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				
				<form action="{{ route('usuarios.store') }}" method="POST" class="form" id="formUser" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Ingresar Nombre">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="text" class="form-control" required name="user" value="{{ old('user') }}" autocomplete="nope" placeholder="Ingresar Usuario">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-lock"></i></div>
								<input type="password" autocomplete="nope" required value="{{ old('password') }}" name="password" class="form-control" placeholder="Ingresar Contraseña">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								<input type="email" class="form-control" required value="{{ old('email') }}" autocomplete="nope" name="email" placeholder="Ingresar Email">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
								<input type="text" class="form-control" required name="dni" value="{{ old('dni') }}" autocomplete="nope" placeholder="Ingresar DNI">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
								<input type="text" class="form-control" required name="phone" value="{{ old('phone') }}" autocomplete="nope" placeholder="Ingresar Teléfono">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-group (alias)"></i></div>
								<select class="form-control" value="{{ old('type') }}" required name="type">
									<option value="">Seleccionar Perfil</option>
									<option value="1">Administrador</option>
									<option value="2">Especial</option>
									<option value="3">Vendedor</option>
								</select>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
								<input type="text" class="form-control" required name="address" value="{{ old('address') }}" autocomplete="nope" placeholder="Ingresar Dirección">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label >Subir Foto</label>
						<input type="file" name="photo" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" action="user">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
@endsection