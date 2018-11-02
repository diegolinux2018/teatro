@extends('layouts.app')

@section('content')
<div class="container_login">
	<form method="POST" action="{{ route('login') }}">
	@csrf

	<h3>{{ __('label.reserva_teatro') }}</h3>
	<h4>{{ __('label.inicio_sesion') }}</h4>
	<fieldset>
		<input id="email" type="email" placeholder="{{ __('label.usuario') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

		@if ($errors->has('email'))
			<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('email') }}</strong>
			</span>
		@endif
	</fieldset>
	<fieldset>
		<input id="password" type="password"  placeholder="{{ __('label.contrasena') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

		@if ($errors->has('password'))
			<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('password') }}</strong>
			</span>
		@endif
	</fieldset>

	<div class="form-group row">
		<div class="col-md-6 offset-md-4">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

			<label class="form-check-label" for="remember">
			{{ __('label.recuerdame') }}
			</label>
		</div>
		</div>
	</div>

	<div class="form-group row mb-0">
		<div class="col-md-8 offset-md-4">
		<button type="submit" class="btn btn-primary">
			{{ __('Login') }}
		</button>

		<a class="btn btn-link" href="{{ route('password.request') }}">
			{{ __('label.olvido_password') }}
		</a>
		</div>
	</div>
	</form>
</div>
@endsection
