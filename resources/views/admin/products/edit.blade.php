@extends('layouts.admin')

@section('title', 'Editar Producto')
@section('page-title', 'Editar Producto')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/select2/select2-bootstrap.css') }}">

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Producto</a></li>
<li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="{{ route('productos.update', ['slug' => $product->slug]) }}" method="POST" class="form" id="formProduct" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="row">

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Categoría</label>
							<select class="form-control" name="category_id">
								<option value="">Seleccione</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" @if($product->category_id==$category->id) selected @endif>{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Proveedor</label>
							<select class="form-control" name="provider_id">
								<option value="">Seleccione</option>
								@foreach($providers as $provider)
								<option value="{{ $provider->id }}" @if($product->provider_id==$provider->id) selected @endif>{{ $provider->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group col-lg-4 col-md-4 col-12">
							<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="name" required placeholder="Introduzca un nombre" value="{{ $product->name }}" id="name" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-4 col-md-4 col-12">
							<label class="col-form-label">Código</label>
							<input class="form-control" type="text" name="cod" placeholder="Introduzca su DNI" value="{{ $product->cod }}" id="dni" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-4 col-md-4 col-12">
							<label class="col-form-label">Stock<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="stock" required placeholder="Introduzca un teléfono" value="{{ $product->stock }}">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Precio de Compra</label>
							<input type="number" class="form-control" id="nuevoPrecioCompra" name="purchase_price" value="{{ $product->purchase_price }}">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Precio de Venta</label>
							<input type="number" step="any" min="0" class="form-control" id="nuevoPrecioVenta" name="sale_price" value="{{ $product->sale_price }}">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
						</div>

						<div class="col-lg-2 col-md-2 col-12">
							<input type="checkbox" class="porcentaje" id="basic_checkbox_2" />
							<label for="basic_checkbox_2" >Utilizar Porcentaje</label>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-12">
							<div class="input-group">
								<input type="number" class="form-control nuevoPorcentaje" required min="0" value="40">
								<div class="input-group-addon"><i class="fa fa-percent"></i></div>
							</div>
						</div>

						<div class="form-group col-12">
							<label class="col-form-label">Foto (Opcional)</label>
							<input type="file" name="photo" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" data-default-file="{{ '/admins/img/products/'.$product->image }}" />
						</div> 

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="customer">Actualizar</button>
								<a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
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
<script src="{{ asset('/admins/vendors/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/select2/es.js') }}"></script>
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection

