@extends('layouts.admin')

@section('title', 'Lista de Ventas')
@section('page-title', 'Lista de Ventas')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/lobibox/Lobibox.min.css') }}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">Ventas</li>
<li class="breadcrumb-item active">Lista</li>
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
				<div class="col-lg-3">
					<a href="{{ route('ventas.create') }}"><button type="button" class="btn btn-info">Crear Venta</button></a>
				</div>
				
				</div>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>N° Factura</th>
								<th>Cliente</th>
								<th>Vendedor</th>
								<th>Forma de Pago</th>
								<th>Neto</th>
								<th>Total</th>
								<th>Fecha</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($sales as $sale)
							<tr>
								<td>{{ $num++ }}</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="d-flex">
									<a class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Imprimir Ticket" href="#"><i class="fa fa-file-text-o"></i></a>&nbsp;&nbsp;
									<a class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Imprimir PDF" href="#"><i class="fa fa-file-pdf-o"></i></a>&nbsp;&nbsp;
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="{{ route('ventas.show', ['slug' => $sale->slug]) }}" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="{{ route('ventas.edit', ['slug' => $sale->slug]) }}"><i class="fa fa-edit"></i></a>
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

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
@endsection