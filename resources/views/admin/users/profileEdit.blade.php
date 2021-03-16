@extends('layouts.admin')

@section('title', 'Modificar Perfil')
@section('page-title', 'Modificar Perfil')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/multiselect/bootstrap.multiselect.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Modificar Perfil</li>
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
		</div>
	</div>

	


	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="{{ route('usuarios.update2', ['slug' => Auth::user()->slug]) }}" method="POST" class="form" id="formUser" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="row">

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="name" required placeholder="Introduzca un nombre" value="{{ Auth::user()->name }}" id="nameUser">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Apellido<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="lastname" required placeholder="Introduzca un apellido" value="{{ Auth::user()->lastname }}" id="lastnameUser">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">País de Procedencia<b class="text-danger">*</b></label>
							<select class="form-control multiselect" name="country_id" required id="countryUser">
								<option value="">Seleccione</option>
								@foreach($countries as $c)
								<option value="{{ $c->id }}" @if(Auth::user()->country_id==$c->id) selected @endif>{{ $c->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">DNI<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="dni" required placeholder="Introduzca su DNI" value="{{ Auth::user()->dni }}" id="dni">
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Género<b class="text-danger">*</b></label>
							<select class="form-control" name="gender" required id="genderUser">
								<option value="Femenino" @if(Auth::user()->gender=='Femenino') selected @endif>Femenino</option>
								<option value="Masculino" @if(Auth::user()->gender=='Masculino') selected @endif>Masculino</option>
							</select>
						</div>

						{{-- <div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Provincia<b class="text-danger">*</b></label>
							<select class="form-control multiselect" required id="multiselectProvinces">
								<option value="">Seleccione</option>
								@foreach($provinces as $province)
								<option value="{{ $province->id }}">{{ $province->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Localidad<b class="text-danger">*</b></label>
							<select class="form-control multiselect" required id="multiselectLocalities"></select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Distrito (Barrio)<b class="text-danger">*</b></label>
							<select class="form-control multiselect" required name="district_id" id="multiselectDistricts"></select>
						</div> --}}

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="address" required placeholder="Introduzca su dirección exacta" value="{{ Auth::user()->address }}" id="addressUser">
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Correo Electrónico<b class="text-danger">*</b></label>
							<input class="form-control" type="email" name="email" required placeholder="Introduzca un correo electrónico" value="{{ Auth::user()->email }}" id="emailUser">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Teléfono<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="phone" required placeholder="Introduzca un teléfono" value="{{ Auth::user()->phone }}" id="phone">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">¿Desea cambiar de contraseña?<b class="text-danger">*</b></label>
							<select class="form-control" name="contraseña" id="con">
								<option value=" ">Seleccione</option>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</div> 

						<span id="contraseña" class="col-lg-12 col-md-12 col-12">
							<div class="form-group col-lg-6 col-md-6 col-12">
								<label class="col-form-label">Contraseña<b class="text-danger">*</b></label>
								<input class="form-control" type="password" name="password" placeholder="********" id="password">
							</div>

							<div class="form-group col-lg-6 col-md-6 col-12">
								<label class="col-form-label">Confirmar Contraseña<b class="text-danger">*</b></label>
								<input class="form-control" type="password" name="password_confirmation" placeholder="********">
							</div>
						</span>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="user">Guardar</button>
								<a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>

</div>


@endsection

@section('script')
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection