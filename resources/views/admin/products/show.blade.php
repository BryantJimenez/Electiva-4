@extends('layouts.admin')

@section('title', 'Ver Producto')
@section('page-title', 'Ver Producto')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Productos</a></li>
<li class="breadcrumb-item active">Ver</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				@include('admin.partials.errors')

				
				<form action="{{ route('productos.update', ['slug' => $product->slug]) }}" method="POST" class="form" id="formproduct" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-12">
							<img src="{{ '/admins/img/products/'.$product->image }}" class="img-fluid">
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Categoría</label>
								<input type="text" class="form-control" disabled="" value="{{ $product->category->name }}">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Proveedor</label>
								<input type="text" class="form-control" disabled="" value="{{ $product->provider->name }}">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Nombre</label>
								<input class="form-control" type="text" disabled="" name="name" required placeholder="Introduzca un nombre" value="{{ $product->name }}" id="name" minlength="2" maxlength="191">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Código</label>
								<input class="form-control" type="text" disabled="" name="cod" placeholder="Introduzca su DNI" value="{{ $product->cod }}" id="dni" minlength="5" maxlength="15">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Stock</label>
								<input class="form-control" type="text" disabled="" name="stock" required placeholder="Introduzca un teléfono" value="{{ $product->stock }}">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Precio de Compra</label>
								<input type="number" class="form-control" disabled="" id="nuevoPrecioCompra" name="purchase_price" value="{{ $product->purchase_price }}">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Precio de Venta</label>
								<input type="number" step="any" min="0" disabled="" class="form-control" id="nuevoPrecioVenta" name="sale_price" value="{{ $product->sale_price }}">
							</div>
						</div>
					</div>

				</form>


				<div class="form-group col-12">
					<div class="btn-group" role="group">
						<a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
@endsection