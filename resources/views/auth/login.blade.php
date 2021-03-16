@extends('layouts.auth')

@section('title', 'Ingresar')

@section('content')

<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
      <form action="{{ route('login') }}" method="POST" id="formLogin" class="login100-form validate-form">
        {{ csrf_field() }}
        <span class="login100-form-title p-b-33">Sales</span>
        <div class="d-flex justify-content-center">
         <span class="login100-form-title p-b-33">Iniciar Sesión</span>
        </div>

        @include('admin.partials.errors')

        <div class="wrap-input100">
          <input class="input100 @error('email') is-invalid @enderror" type="username" name="email" required value="{{ old('email') }}" placeholder="Correo Electrónico o Usuario" autofocus>
          <span class="focus-input100-1"></span>
          <span class="focus-input100-2"></span>
        </div>

        <div class="wrap-input100 rs1">
          <input class="input100 @error('password') is-invalid @enderror" type="password" required name="password" placeholder="Contraseña">
          <span class="focus-input100-1"></span>
          <span class="focus-input100-2"></span>
        </div>

        <div class="container-login100-form-btn m-t-20">
          <button class="login100-form-btn" action="login">Ingresar</button>
        </div>

        <div class="text-center p-t-45 p-b-4">
          <span class="txt1">Olvidaste tu contraseña?</span>
          <a href="{{ route('password.request') }}" class="txt2 hov1">Recuperala</a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection