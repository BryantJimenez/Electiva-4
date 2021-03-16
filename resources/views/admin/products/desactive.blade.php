@extends('layouts.admin')

@section('title', 'Lista de Productos')
@section('page-title', 'Lista de Productos')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/dropify/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/multiselect/bootstrap.multiselect.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Productos Desactivados</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<a href="{{ route('productos.index') }}"><button type="button" class="btn btn-success">Productos Activos</button></a>
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
								<td>{{ $product->stock }}</td>
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

@endsection

@section('script')

<script src="{{ asset('/admins/vendors/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/additional-methods.js') }}"></script>
<script src="{{ asset('/admins/vendors/validate/messages_es.js') }}"></script>
<script src="{{ asset('/admins/js/validate.js') }}"></script>
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>

@endsection