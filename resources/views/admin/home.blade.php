@extends('layouts.admin')

@section('title', 'Inicio')
@section('page-title', 'Panel de Inicio')

@section('links')
<link rel="stylesheet" href="{{ asset('/admins/vendors/chartist-js/dist/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/chartist-js/dist/chartist-init.css') }}">
<link rel="stylesheet" href="{{ asset('/admins/vendors/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}">
@endsection

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-3">
				<div class="card bg-info text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white">{{ $sale }}</h1>
								<h6 class="text-white">Ventas</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-dollar (alias) display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-success text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white">{{ $category }}</h1>
								<h6 class="text-white">Categorías</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-tasks display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-warning text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white">{{ $customer }}</h1>
								<h6 class="text-white">Clientes</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-user-plus display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-danger text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white">{{ $product }}</h1>
								<h6 class="text-white">Productos</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-shopping-cart display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('/admins/vendors/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('/admins/vendors/chartist-js/dist/chartist-init.js') }}"></script>
@endsection