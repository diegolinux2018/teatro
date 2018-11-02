@extends('layouts.app')

@section('content')

<div class="container">
	@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
	@endif

	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#TabRservar">{{ __('label.reserva_teatros') }}</a></li>
	</ul>
	<div class="tab-content">
		<div id="TabRservar" class="tab-pane fade in active">
			<!-- Botón CREAR -->
			<div class="container-fluid">
				<div class="row gutter">
					<div class="col-md-10 col-sm-6 col-xs-12">
						<h3 class="page-title" id="title"></h3>
					</div>
					<div class="col-md-2 col-sm-6 col-xs-12">
						<ul class="tasks pull-right clearfix">
							<button id="btnNuevoReserva" name="btnNuevoReserva" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-reserva"><i class="icon-circle-plus icon-left"></i>{{ __('label.nuevo') }}</button>
						</ul>
					</div>
				</div>
			</div>
		
			<table class="table table-bordered" id="tblReserva">
				<thead>
				<tr>
					<th>Id</th>
					<th>Teatro</th>
					<th>Fecha</th>
					<th>Zona</th>
					<th>Acientos</th>
					<TH></TH>
				</tr>
				</thead>
			</table>
		
			<div class="modal fade" id="modal-reserva" tabindex="-1" role="dialog" aria-labelledby="modal-reserva">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" accion="btnNuevo">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<p id="msnResultado"></p> 
							<form id="formularioReserva" name="formularioReserva">
								<input id="hdnResId" name="hdnResId" type="hidden" value="0">
								<h3>Crea tu reserva de pelicula</h3>
								<h4>Selecciona el teatro, las zonas y luego tus acientos</h4>
								<fieldset>
									<input type="date" name="txtFechaReserva" id="txtFechaReserva" class="form-control" >
								</fieldset>
								<fieldset>
									<select id="ddlTeatroReserva" name="ddlTeatroReserva" class="form-control" >
										<OPTION value="">Seleccione un teatro</OPTION>
									</select>
								</fieldset>
								<fieldset>
									<select id="ddlZonaReserva" name="ddlZonaReserva" class="form-control" >
										<OPTION value="">Seleccione una zona</OPTION>
									</select>
								</fieldset>
								<fieldset>
									<select id="ddlFilaReserva" name="ddlFilaReserva" class="form-control" >
										<OPTION value="">Seleccione una Fila</OPTION>
									</select>
								</fieldset>
								<fieldset>
									<select id="ddlSillaReserva" name="ddlSillaReserva" class="form-control" >
										<OPTION value="">Seleccione una Silla</OPTION>
									</select>
								</fieldset>
								<fieldset>
									<input type="text" id="txtSeleccionadas" placeholder="Sillas seleccionadas" readonly="true" class="form-control" name="txtSeleccionadas">
								</fieldset>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-circle-with-cross icon-left"></i> CERRAR</button>
									<button type="button" class="btn btn-info" id="btnGuardarReserva" name="btnGuardarReserva"><i class="icon-save icon-left"></i> GUARDAR </button>
								</div>
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>


	@push('scripts')
	<script>
		var RutaListarReserva = '{!! route('reserva.listar') !!}';
		var RutaGuardarReserva = '{!! route('reserva.guardar') !!}';
		var RutaEditarReserva = '{!! route('reserva.editar') !!}';
		var RutaEliminarReserva = '{!! route('reserva.eliminar') !!}';
		var RutaGetTeatro = '{!! route('teatro.get_teatros') !!}';
		var RutaGeZona = '{!! route('zona.get_zonas') !!}';
		var RutaEditarZona = '{!! route('zona.editar') !!}';
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	</script>
	<script src="../../../resources/views/reserva/js/reserva.js">

	</script>
	@endpush
@endsection
