@extends('layouts.admin')

@section('title', 'Registro de Clientes')
@section('page-title', 'Registro de Clientes')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2-bootstrap.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
<li class="breadcrumb-item active">Registro</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="{{ route('clientes.store') }}" method="POST" class="form" id="formCustomer" enctype="multipart/form-data">
					@csrf
					<div class="row">

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="name" required placeholder="Introduzca un nombre" value="{{ old('name') }}" id="name" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Apellido<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="lastname" required placeholder="Introduzca un apellido" value="{{ old('lastname') }}" id="lastname" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">DNI (Opcional)</label>
							<input class="form-control" type="text" name="dni" placeholder="Introduzca su DNI" value="{{ old('dni') }}" id="dni" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Teléfono<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="phone" required placeholder="Introduzca un teléfono" value="{{ old('phone') }}" id="phone" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Correo Electrónico (Opcional)</label>
							<input class="form-control" type="email" name="email" placeholder="Introduzca un correo electrónico" value="{{ old('email') }}" minlength="5" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Provincia (Opcional)</label>
							<select class="form-control select2" id="multiselectProvinces">
								<option value="">Seleccione</option>
								@foreach($provinces as $province)
								<option value="{{ $province->id }}">{{ $province->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Localidad (Opcional)<button type="button" class="btn btn-sm btn-primary ml-2 d-none" id="addLocality">Agregar</button></label>
							<select class="form-control select2" disabled id="multiselectLocalities">
								<option value="">Seleccione</option>
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Barrio (Opcional)<button type="button" class="btn btn-sm btn-primary ml-2 d-none" id="addDistrict">Agregar</button></label>
							<select class="form-control select2" name="district_id" disabled id="multiselectDistricts">
								<option value="">Seleccione</option>
							</select>
						</div>

						<div class="form-group col-12">
							<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="address" required placeholder="Introduzca su dirección exacta" value="{{ old('address') }}" minlength="5" maxlength="191">
						</div>
						
						<div class="form-group col-12">
							<label class="col-form-label">Observación (Opcional)</label>
							<textarea class="form-control" name="observation" placeholder="Introduzca su observación del cliente" minlength="2" maxlength="191">{{ old('observation') }}</textarea>
						</div>

						<div class="form-group col-12">
							<label class="col-form-label">Foto (Opcional)</label>
							<input type="file" name="photo" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" />
						</div>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="customer">Guardar</button>
								<a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addLocalityModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Registrar localidad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<div class="row">					
					<div class="form-group col-12">
						<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
						<input type="text" class="form-control only-letters" name="nameLocality" placeholder="Introduzca el nombre de la localidad" minlength="2" maxlength="191" readonly>
						<p class="text-danger d-none" id="localityErrors"></p>
					</div>
				</div>

				<div class="alert alert-success d-none" id="localityAlertSuccess">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Se ha registrado la localidad exitoamente.</li>
					</ul>
				</div>
				<div class="alert alert-danger d-none" id="localityAlertDanger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Ha ocurrido un error, intentelo denuevo.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="submitLocality">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addDistrictModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Registrar Barrio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<div class="row">
					<div class="form-group col-12">
						<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
						<input type="text" class="form-control only-letters" name="nameDistrict" placeholder="Introduzca el nombre del barrio" minlength="2" maxlength="191" readonly>
						<p class="text-danger d-none" id="districtErrors"></p>
					</div>
				</div>

				<div class="alert alert-success d-none" id="districtAlertSuccess">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Se ha registrado el barrio exitoamente.</li>
					</ul>
				</div>
				<div class="alert alert-danger d-none" id="districtAlertDanger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Ha ocurrido un error, intentelo denuevo.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="submitDistrict">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/select2/es.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection