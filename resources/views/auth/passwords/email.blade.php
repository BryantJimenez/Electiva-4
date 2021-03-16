@extends('layouts.auth')

@section('title', 'Recuperar Contraseña')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form action="{{ route('password.email') }}" method="POST" id="formLogin" class="login100-form validate-form">
                {{ csrf_field() }}
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('/admins/img/logo.jpg') }}" width="85" height="70" alt="Logo">
                </div>
                <span class="login100-form-title p-b-33">RECUPERAR CONTRASEÑA</span>
                <p class="text-muted">Ingresa tu correo y te enviaremos un link para que recuperes tu contraseña.</p>

                @include('admin.partials.errors')

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="wrap-input100">
                    <input class="input100 @error('email') is-invalid @enderror" type="email" name="email" required value="{{ old('email') }}" placeholder="Correo Electrónico" autofocus>
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="container-login100-form-btn m-t-20">
                  <button class="login100-form-btn" action="login">Enviar</button>
              </div>

              <div class="text-center p-t-45 p-b-4">
                  <span class="txt1">Deseas ingresar?</span>
                  <a href="{{ route('login') }}" class="txt2 hov1">Ingresa</a>
              </div>
          </form>
      </div>
  </div>
</div>

@endsection
