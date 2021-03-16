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
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<select class="form-control">
						<option value="">Rango de Fecha</option>
					</select>
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
							@foreach($ventas as $v)
							<tr>
								<td class="text-center">{{ $loop->iteration }}</td>
								<td class="text-center">{{ $v->codigo }}</td>
								<td class="text-center">{{ $v->cliente->name }}</td>
								<td class="text-center">{{ $v->vendedor->name }}</td>
								<td class="text-center">{{ $v->metodo_pago }}</td>
								<td class="text-center">{{ $v->neto }}$</td>
								<td class="text-center">{{ $v->total }}</td>
								<td class="text-center">{{ $v->created_at->format('d-m-Y') }}<br><strong><small>({{ $v->created_at->diffForHumans() }})</small></strong></td>
								<td class="d-flex">
									
									<a class="btn btn-danger btn-circle btn-sm modalDelete" data-url="{{ route('ventas.destroy',$v->id) }}" data-placement="bottom" title="Eliminar" data-codigo="{{ $v->codigo }}" data-id="{{ $v->id }}"><i class="mdi mdi-delete-empty"></i></a>&nbsp;&nbsp;
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-bold" id="exampleModalLabel">ELIMINAR VENTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_delete">
        	@csrf
        	@method('DELETE')
        	<input type="hidden" name="id" id="id_venta">
        	<h2>¿Desea Borrar la venta <strong id="codigo_venta"></strong>?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Si, Borrar la venta.</button>
       </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('/admins/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/lobibox/Lobibox.js') }}"></script>
<script type="text/javascript">
	$(".modalDelete").click(function(event) {
		let id = $(this).data('id');
		    url = $(this).data('url');
		    codigo = $(this).data('codigo');  
		$("#form_delete").attr('action',url);
		$("#codigo_venta").text(codigo);
		$("#id_venta").val(id);
		$("#deleteModal").modal('show');
	});
</script>
@endsection