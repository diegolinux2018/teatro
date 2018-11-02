<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reserva teatrales') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js'></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}


@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #7775;
}

.container {
  width: 100%;
  margin: 0 auto;
  position: relative;
}

.container_login {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

form input[type="text"],
form input[type="email"],
form input[type="tel"],
form input[type="url"],
form textarea,
form button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

form {
  background: #F9F9F9;
  padding: 25px;
 
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

form h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

form h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

form input[type="text"],
form input[type="email"],
form input[type="tel"],
form input[type="url"],
form textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

form input[type="text"]:hover,
form input[type="email"]:hover,
form input[type="tel"]:hover,
form input[type="url"]:hover,
form textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

form textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

form button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

form button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

form button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

form input:focus,
form textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}

.dataTables_wrapper
{
	background: white;
	width: 100%;
	padding: 28px;
}

</style>

</head>
<body>
    <div id="app">
	<div class="navbar">
  		<a  href="#"><i class="fa fa-fw fa-home"></i>  {{ config('app.name', 'Reserva teatrales') }}</a>
		@guest
			<a class="active" href="{{ route('login') }}"><i class="fa fa-fw fa-search"></i> {{ __('Login') }}</a>
			@if (Route::has('register'))
			<a href="{{ route('register') }}"><i class="fa fa-fw fa-search"></i>{{ __('label.registrar') }}</a>
			@endif

		@else
			<a class="active" ><i class="fa fa-fw fa-search"></i> {{ Auth::user()->name }}</a>
			@if (Auth::user()->id == 1)
			<a href="{{ route('home') }}"><i class="fa fa-fw fa-search"></i> {{ __('label.administrar') }}</a>
			@endif
			<a href="{{ route('reserva.index') }}"><i class="fa fa-fw fa-search"></i> {{ __('label.reservar') }}</a>
			<a href="{{ route('login') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-search"></i> {{ __('label.logout') }}</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
			</form>
		@endguest
	</div>


        <main class="py-4">
            @yield('content')
        </main>

        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	@stack('scripts')
    </div>
</body>
</html>
