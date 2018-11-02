@extends('layouts.app')

@section('content')
<div class="container">
	@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
	@endif

	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#TabTeatro">{{ __('label.teatro') }}</a></li>
		<li ><a data-toggle="tab" href="#TabZonas">{{ __('label.zonas') }}</a></li>
	</ul>
	<div class="tab-content">
		<div id="TabTeatro" class="tab-pane fade in active">
			@include("teatro.formTeatro")
		</div>
		<div id="TabZonas" class="tab-pane fade">
			@include("teatro.formZona")
		</div>

	</div>
</div>
@endsection
