
	<!-- Botón CREAR -->
	<div class="container-fluid">
		<div class="row gutter">
			<div class="col-md-10 col-sm-6 col-xs-12">
				<h3 class="page-title" id="title"></h3>
			</div>
			<div class="col-md-2 col-sm-6 col-xs-12">
				<ul class="tasks pull-right clearfix">
					<button id="btnNuevoTeatro" name="btnNuevoTeatro" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-registro"><i class="icon-circle-plus icon-left"></i>{{ __('label.nuevo') }}</button>
				</ul>
			</div>
		</div>
	</div>

	<table class="table table-bordered" id="tblTeatro">
		<thead>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Direccion</th>
			<TH></TH>
		</tr>
		</thead>
	</table>

	<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="modal-registro">
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
					<form id="formulario">
						<input id="hdnTeaId" name="hdnTeaId" type="hidden" value="0">
						<h3>Registrar teatro</h3>
						<h4>Digite el nombre y direccion del teatro</h4>
						<fieldset>
							<input type="text" id="txtNombre" placeholder="Nombre teatro" class="form-control" name="txtNombre" >
						</fieldset>
						<fieldset>
							<input type="text" id="txtDireccion" placeholder="Direccion teatro" class="form-control"  name="txtDireccion" >
						</fieldset>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-circle-with-cross icon-left"></i> CERRAR</button>
							<button type="button" class="btn btn-info" id="btnGuardarTeatro" name="btnGuardarTeatro"><i class="icon-save icon-left"></i> GUARDAR </button>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>


	@push('scripts')
	<script>
		var RutaListar = '{!! route('teatro.listar') !!}';
		var RutaGuardar = '{!! route('teatro.guardar') !!}';
		var RutaEditar = '{!! route('teatro.editar') !!}';
		var RutaEliminar = '{!! route('teatro.eliminar') !!}';
		var RutaGetTeatro = '{!! route('teatro.get_teatros') !!}';
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	</script>
	<script src="../../resources/views/teatro/js/teatro.js">

	</script>
	@endpush
