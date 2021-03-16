@extends('layouts.admin')

@section('title', 'Perfil de Cliente')
@section('page-title', 'Perfil de Cliente')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Clientes</a></li>
<li class="breadcrumb-item active">Perfil</li>
@endsection


@section('content')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body little-profile text-center">
				<div class="pro-img m-t-20"><img src="{{ '/admins/img/users/'.$customer->photo }}" alt="Foto de cliente"></div>
				<h3 class="m-b-0">{{ $customer->name.' '.$customer->lastname }}</h3>
				<h6>{!! userType($customer->type) !!}</h6>
			</div>
			<div class="text-center bg-light">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20 b-r">
						<h4 class="m-b-0 font-medium">{{ $customer->name }}</h4><small><b>País de Origen</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium">@if($customer->dni!==NULL) {{ number_format($customer->dni, 0, ".", ".") }} @else <span class="badge badge-dark">Desconocido</span> @endif</h4><small><b>DNI</b></small>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20 b-r">
						<h4 class="m-b-0 font-medium">@if($customer->email!==NULL) {{ $customer->email }} @else <span class="badge badge-dark">Desconocido</span> @endif</h4><small><b>Correo Electrónico</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium">{{ $customer->phone }}</h4><small><b>Teléfono</b></small>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium">{!! userState($customer->state) !!}</h4><small><b>Estado</b></small>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium">{{ $customer->address}}</h4><small><b>Dirección</b></small>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	

	<div class="card-body text-center">
		<a href="{{ route('clientes.edit', ['slug' => $customer->slug]) }}" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Editar</a>
		<a href="{{ route('clientes.index') }}" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-secondary btn-md btn-rounded">Volver</a>
	</div>
</div>

@endsection

