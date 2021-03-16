@extends('layouts.admin')

@section('title', 'Perfil de Proveedor')
@section('page-title', 'Perfil de Proveedor')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
<li class="breadcrumb-item active">Perfil</li>
@endsection

@section('content')


<div class="row">
	<div class="col-lg-8 col-md-8 col-8">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><span class="lstick"></span> Proveedor # {{ $provider->id }}</h4>
				<ul class="feeds">
					<li>
						<div class="bg-light-info"><i class="fa fa-user"></i>
						</div>Nombre: {{ $provider->name }} 

					</li>
					<li>
						<div class="bg-light-success"><i class="fa fa-id-card-o"></i>
						</div>DNI: {{ $provider->dni }} 

					</li>
					<li>
						<div class="bg-light-danger"><i class="fa fa-envelope"></i>
						</div>Email: {{ $provider->email }}

					</li>
					<li>
						<div class="bg-light-inverse"><i class="fa fa-phone"></i>
						</div>Teléfono: {{ $provider->phone }} 
					</li>

					<li>
						<div class="bg-light-danger"><i class="fa fa-map-marker"></i>
						</div>Dirección: {{ $provider->address }}
					</li>
					<li>
						<div class="bg-light-inverse"><i class="fa fa-group (alias)"></i>
						</div>Tipo: @if($provider->type==4)<strong>Proveedor Particular</strong>
									@elseif($provider->type==5)<strong>Proveedor Empresarial</strong>
									@endif

					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-4">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><span class="lstick"></span> Acciones</h4>
				<ul class="feeds">
					<li>
						<a href="{{ route('proveedores.edit', ['slug' => $provider->slug]) }}" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Editar</a>
					</li>
					<li>
						@if($provider->state==0)
						<button class="m-t-10 m-b-20 waves-effect waves-dark btn btn-success btn-md btn-rounded" onclick="activateProvider('{{ $provider->slug }}')">Activar</button>
						@else
						<button class="m-t-10 m-b-20 waves-effect waves-dark btn btn-danger btn-md btn-rounded" onclick="deactivateProvider('{{ $provider->slug }}')">Desactivar</button>
						@endif
					</li>
					<li>
						<a href="{{ route('proveedores.index') }}" class="m-t-10 m-b-20 text-center waves-effect waves-dark btn btn-secondary btn-md btn-rounded">Volver</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

@if($provider->state==1)
<div class="modal fade" id="deactivateProvider" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar este Proveedor?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeactivateProvider">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Desactivar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
@else
<div class="modal fade" id="activateProvider" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este Proveedor?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formActivateProvider">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-primary">Activar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
@endif

@endsection