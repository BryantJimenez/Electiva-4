@extends('layouts.admin')

@section('title', 'Editar Cliente')
@section('page-title', 'Editar Cliente')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2-bootstrap.css') }}">

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
<li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="{{ route('clientes.update', ['slug' => $customer->slug]) }}" method="POST" class="form" id="formCustomer" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="name" required placeholder="Introduzca un nombre" value="{{ $customer->name }}" id="name" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">DNI (Opcional)</label>
							<input class="form-control" type="text" name="dni" placeholder="Introduzca su DNI" value="{{ $customer->dni }}" id="dni" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Teléfono<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="phone" required placeholder="Introduzca un teléfono" value="{{ $customer->phone }}" id="phone" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Correo Electrónico (Opcional)</label>
							<input class="form-control" type="email" name="email" placeholder="Introduzca un correo electrónico" value="{{ $customer->email }}" minlength="5" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="address" required placeholder="Introduzca su dirección exacta" value="{{ $customer->address }}" minlength="5" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Tipo<b class="text-danger">*</b></label>
							<select class="form-control" name="type" required>
								<option value="">Seleccione</option>
								<option value="1" @if($customer->type==1) selected @endif>Administrador</option>
								<option value="2" @if($customer->type==2) selected @endif>Vendedor</option>
								<option value="3" @if($customer->type==3) selected @endif>Especial</option>
								<option value="4" @if($customer->type==4) selected @endif>Proveedor Particular</option>
								<option value="5" @if($customer->type==5) selected @endif>Proveedor Empresarial</option>
								<option value="6" @if($customer->type==6) selected @endif>Cliente</option>
							</select>
						</div>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="customer">Actualizar</button>
								<a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
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
<script src="{{ asset('/admins/vendors/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/select2/es.js') }}"></script>
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection

