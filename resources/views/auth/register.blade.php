@extends('layouts.app')

@section('content')
<div class="container">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
			<h3>{{ __('label.reserva_teatro') }}</h3>
			<h4>{{ __('label.registrar_usuario') }}</h4>

			<fieldset>
			<input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

			@if ($errors->has('name'))
				<span class="invalid-feedback" role="alert">
				<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
			</fieldset>

			<fieldset>
                                <input id="email" type="email" placeholder="{{ __('label.usuario') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
			</fieldset>

			<fieldset>
                                <input id="password" type="password" placeholder="{{ __('label.contrasena') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
			</fieldset>

			<fieldset>
                                <input id="password-confirm" type="password" placeholder="{{ __('label.confirmar_contrasena') }}" class="form-control" name="password_confirmation" required>
			</fieldset>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>
@endsection
