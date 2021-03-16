@extends('layouts.admin')

@section('title', 'Lista de Productos')
@section('page-title', 'Lista de Productos')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/multiselect/bootstrap.multiselect.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Productos</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		@include('admin.partials.errors')
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Producto</button>
				<a href="{{ route('productos.desactivados') }}"><button type="button" class="btn btn-danger">Productos Desactivados</button></a>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Categoría</th>
								<th>Stock</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
								<td>{{ $num++ }}</td>
								<td>{{ $product->cod }}</td>
								<td>
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='{{ asset('/admins/img/products/'.$product->image) }}' style='width: 150px; height: 150px;' ><br><b>{{ $product->name}}</b>"><img src="{{ asset('/admins/img/products/'.$product->image) }}" class="img-circle" alt="Foto del Producto" width="40" height="40" /> {{ $product->name }}</a>
									</span>
								</td>
								<td>{{ $product->category->name }}</td>
								<td>{!! stock($product->stock) !!}</td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="{{ route('productos.show', ['slug' => $product->slug]) }}" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="{{ route('productos.edit', ['slug' => $product->slug]) }}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									@if($product->state==0)
									<button class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="activateProduct('{{ $product->slug }}')"><i class="fa fa-check"></i></button>
									@else
									<button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" onclick="deactivateProduct('{{ $product->slug }}')"><i class="fa fa-history"></i></button>
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

<div class="modal fade" id="deactivateProduct" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar este producto?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeactivateProduct">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Desactivar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="activateProduct" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este producto?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formActivateProduct">
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
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Producto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('productos.store') }}" method="POST" class="form" id="formProduct" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-sort-alpha-desc"></i></div>
								<select class="form-control" value="{{ old('category_id') }}" required name="category_id">
									<option value="">Seleccionar Categoría</option>
									@foreach($category as $cat)
									<option value="{{ $cat->id }}">{{ $cat->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-handshake-o"></i></div>
								<select class="form-control" value="{{ old('provider_id') }}" required name="provider_id">
									<option value="">Seleccionar Proveedor</option>
									@foreach($provider as $pro)
									<option value="{{ $pro->id }}">{{ $pro->name }} <strong>{!! userType($pro->type) !!}</strong></option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-address-card-o"></i></div>
								<input type="text" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Ingresar Nombre">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-barcode"></i></div>
								<input type="text" class="form-control" required name="cod" value="{{ old('cod') }}" autocomplete="nope" placeholder="Ingresar Código">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-warning (alias)"></i></div>
								<input type="text" class="form-control" required name="stock" value="{{ old('stock') }}" autocomplete="nope" placeholder="Ingresar Stock">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-arrow-circle-up"></i></div>
								<input type="number" class="form-control" id="nuevoPrecioCompra" required name="purchase_price" value="{{ old('purchase_price') }}" placeholder="Precio Compra">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-arrow-circle-down"></i></div>
								<input type="number" step="any" min="0" class="form-control" id="nuevoPrecioVenta" required name="sale_price" value="{{ old('sale_price') }}" placeholder="Precio de Venta">
							</div>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-12">
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<input type="checkbox" class="porcentaje" id="basic_checkbox_2" />
							<label for="basic_checkbox_2" >Utilizar Porcentaje</label>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-12">
							<div class="input-group">
								<input type="number" class="form-control nuevoPorcentaje" required min="0" value="40">
								<div class="input-group-addon"><i class="fa fa-percent"></i></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label >Subir Archivo</label>
						<input type="file" name="image" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" action="product">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->

@endsection

@section('script')

<script type="text/javascript">
/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(".nuevoPorcentaje").val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly",true);

	} else{

	}

})

/*=============================================
CAMBIO DE PORCENTAJE
=============================================*/
$(".nuevoPorcentaje").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(this).val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly",true);

	}

})

$(".porcentaje").on("ifUnchecked", function(){

	$("#nuevoPrecioVenta").html("readonly",false);
	$("#editarPrecioVenta").html("readonly",false);

})

$(".porcentaje").on("ifChecked", function(){

	$("#nuevoPrecioVenta").html("readonly",true);
	$("#editarPrecioVenta").html("readonly",true);

})

</script>

<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/multiselect/bootstrap-multiselect.js') }}"></script>
{{-- <script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script> --}}
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
@endsection