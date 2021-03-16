@extends('layouts.admin')

@section('title', 'Registrar Venta')
@section('page-title', 'Registrar Venta')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/multiselect/bootstrap.multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2-bootstrap.css') }}">

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Ventas</a></li>
<li class="breadcrumb-item active">Registrar</li>
@endsection

@section('content')

<div class="row">
	<div class="col-lg-5">
		<div class="card">
			<div class="card-body">
				<div class="d-flex">
					<div>
						<h4 class="card-title"><span class="lstick"></span>Realice una Venta</h4>
					</div>
				</div>

				@include('admin.partials.errors')

				<form action="{{ route('ventas.store') }}" method="POST" class="form" id="formProduct" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly="">
							</div>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="text" class="form-control"name="name" value="{{ old('name') }}" readonly="">
							</div>
						</div>

						<div class="form-group col-lg-6">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar un Cliente</button>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<select class="form-control multiselect" value="{{ old('category_id') }}" required name="category_id">
								<option value="">Seleccionar un Cliente</option>
								@foreach($users as $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-lg-2 col-md-2 col-12">
						</div>

						<div class="form-group col-lg-5 col-md-5 col-12">
							<label class="col-form-label"><strong>Impuesto</strong></label>
							<div class="input-group">
								<input type="number" class="form-control nuevoPorcentaje" required min="0" value="0">
								<div class="input-group-addon"><i class="fa fa-percent"></i></div>
							</div>
						</div>

						<div class="form-group col-lg-5 col-md-5 col-12">
							<label class="col-form-label"><strong>Total</strong></label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
								<input type="number" class="form-control nuevoPorcentaje" readonly="" required min="0" value="40">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<select class="form-control" value="{{ old('category_id') }}" id="typePay" required name="category_id">
								<option value="0">Seleccione un método de pago</option>
								<option value="1">Efectivo</option>
								<option value="2">Tarjeta de Crédito</option>
								<option value="3 ">Tarjeta de Débito</option>
							</select>
						</div>

						<div id="one" class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Código de Transacción" name="name">
								<div class="input-group-addon"><i class="fa fa-lock"></i></div>
							</div>
						</div>

						<div id="two" class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
								<input type="number" class="form-control nuevoPorcentaje" required min="0" value="40">
							</div>
						</div>

						<div id="three" class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
								<input type="number" class="form-control nuevoPorcentaje" readonly="" required min="0" value="40">
							</div>
						</div>

						


					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" action="product">Guardar Venta</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{-- INICIO PRODUCTOS --}}

	<div class="col-lg-7">
		<div class="card">
			<div class="card-body">
				<div class="d-flex">
					<div>
						<h4 class="card-title"><span class="lstick"></span>Productos Activos</h4>
					</div>
				</div>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>N°</th>
								<th>Nombre</th>
								<th>Código</th>
								<th>Stock</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
								<td>{{ $num++ }}</td>
								<td>									
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='{{ asset('/admins/img/products/'.$product->image) }}' style='width: 150px; height: 150px;' ><br><b>{{ $product->name}}</b>"><img src="{{ asset('/admins/img/products/'.$product->image) }}" class="img-circle" alt="Foto del Producto" width="40" height="40" /> {{ $product->name }}</a>
									</span>
								</td>
								<td>{{ $product->cod }}</td>
								<td>{!! stock($product->stock) !!}</td>
								<form action="" method="POST">
									@csrf
									<input type="hidden" name="id" id="id" value="{{ $product->id }}">
									<td><button type="submit" id="add" class="btn btn-info">Agregar</button></td>
								</form>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	{{-- FIN PRODUCTOS --}}

</div>

{{-- INICIO MODAL DE CLIENTES --}}

{{-- //////////////////Modal de Registro de Usuarios///////////////////////// --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Cliente</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('clientes.store') }}" method="POST" class="form" id="formCustomer">
					@csrf

					@include('admin.partials.errors')

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
								<input type="text" class="form-control" required name="dni" value="{{ old('dni') }}" autocomplete="nope" placeholder="Ingresar DNI">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								<input type="email" class="form-control" value="{{ old('email') }}" value="email" autocomplete="nope" name="email" placeholder="Ingresar Email">
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



					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary"  action="customer">Guardar Cliente</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<!-- /.modal -->

{{-- FIN MODAL DE CLIENTES --}}

@endsection

@section('script')
<script type="text/javascript">
	//Agregar producto del carrito

</script>
<script src="{{ asset('/admins/vendors/multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/select2/es.js') }}"></script>
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection
