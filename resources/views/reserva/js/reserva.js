//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion al ejecutarce despues de que carga la pagina y realiza las acciones de dibujar las tablas
//Asocia las funciones a los botones

$(document).ready(function ()
{

	//Data table, lista uusarios
	$('#tblReserva').DataTable({
		processing: true,
		serverSide: true,
		ajax: RutaListarReserva,
		columns: [
		{ data: 'res_id', name: 'res_id' },
		{ data: 'tea_nombre', name: 'tea_nombre' },
		{ data: 'res_fecha', name: 'res_fecha' },
		{ data: 'zon_nombre', name: 'zon_nombre' },
		{ data: 'res_aciento', name: 'res_aciento' },
		{data: 'action', name: 'action'}
		]
	});
	//Asigno las funciones a cada evento
	$("#btnNuevoReserva").on('click',cleanFormReserva);
	$("#btnGuardarReserva").on('click',GuardarRegistroReserva);
	$("#ddlTeatroReserva").on('change',getZonasRserva);
	$("#ddlZonaReserva").on('change',getFilasSillas);	
});

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que limpia el formulario cuando se da click en el boton de nuevo
function cleanFormReserva()
{	
	var $inputs = $('#formularioReserva  :input');
	$inputs.each(function ()
	{
		$(this).val("");
	});
	$("#hdnResId").val("0");
	getTeatrosRserva();
}


//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion carcardatos
//Envia por get el id del registro
function EditarReserva(id)
{
	jQuery.ajax({
		url: RutaEditarReserva,
		method: 'get',
		data: {
			_token: CSRF_TOKEN,
			hdnResId: id,
		},
		dataType: 'JSON',
		success: function(result){
			$('#modal-reserva').modal();
			jQuery('#hdnResId').val(result[0].res_id);
			jQuery('#txtFechaReserva').val(result[0].res_fecha);
			jQuery('#ddlZonaReserva').val(result[0].zon_id);
			jQuery('#txtSeleccionadas').val(result[0].res_aciento);

			//jQuery('#ddlTeatro').val(result[0].tea_id);
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion de eliminar un registro
//Envia por get el id del registro
function EliminaReserva(id)
{
	jQuery.ajax({
		url: RutaEliminarReserva,
		method: 'post',
		data: {
			_token: CSRF_TOKEN,
			hdnResId: id,
		},
		dataType: 'JSON',
		success: function(result){
			$('#tblReserva').DataTable().ajax.reload(); 
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//FUncion que llama la funcion guardardatos
//Envia los datos del formulario y realiza las validaciones
function GuardarRegistroReserva()
{
	$("#formularioReserva").validate({
		rules: {
			txtFechaReserva:"required",
			ddlTeatroReserva:"required",
			ddlZonaReserva:"required",
			ddlFilaReserva:"required",
			ddlSillaReserva:"required",
		
		},
		messages: {
			txtFechaReserva: "Seleccione una fecha",
			ddlTeatroReserva: "Seleccione un teatro",
			ddlZonaReserva: "Seleccione una zona",
			ddlFilaReserva: "Seleccione una fila",
			ddlSillaReserva: "Seleccione un Aciento",
		},
	});

	if( !$("#formularioReserva").valid() )
	{
		return false;
	}

	jQuery.ajax({
		url: RutaGuardarReserva,
		method: 'post',
		data: {
			_token: CSRF_TOKEN,
			hdnResId: jQuery('#hdnResId').val(),
			txtFechaReserva: jQuery('#txtFechaReserva').val(),
			ddlZona: jQuery('#ddlZonaReserva').val(),
			Aciento: jQuery('#ddlFilaReserva').val() + jQuery('#ddlSillaReserva').val(),
		},
		dataType: 'JSON',
		success: function(result){
			alert(result.success);
			jQuery('#tblReserva').DataTable().ajax.reload(); 

			if(result.idRes)
			{
				jQuery('#hdnResId').val(result.idRes);
			}
			if(result.seleccionadas)
			{
				jQuery('#txtSeleccionadas').val(result.seleccionadas);
			}
			jQuery('#ddlFilaReserva').val("");
			jQuery('#ddlSillaReserva').val("");
			//console.log(result);
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion de traer todos los teatros creados
//Envia por get el id del registro
function getTeatrosRserva()
{
	$("#ddlTeatroReserva").children('option:not(:first)').remove();
	jQuery.ajax({
		url: RutaGetTeatro,
		method: 'get',
		data: {
			_token: CSRF_TOKEN,
		},
		dataType: 'JSON',
		success: function(result){
			$.each(result, function (i, data)
			{
				$("#ddlTeatroReserva").append('<option value="' + data.tea_id + '">' + data.tea_nombre + '</option>');
			});

		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion de traer todos los teatros creados
//Envia por get el id del registro
function getZonasRserva()
{
	$("#ddlZonaReserva").children('option:not(:first)').remove();
	jQuery.ajax({
		url: RutaGeZona,
		method: 'get',
		data: {
			_token: CSRF_TOKEN,
			idTea: jQuery("#ddlTeatroReserva").val()
		},
		dataType: 'JSON',
		success: function(result){
			$.each(result, function (i, data)
			{
				$("#ddlZonaReserva").append('<option value="' + data.zon_id + '">' + data.zon_nombre + '</option>');
			});

		}});
}

function getFilasSillas()
{
	$("#ddlFilaReserva").children('option:not(:first)').remove();
	$("#ddlSillaReserva").children('option:not(:first)').remove();

	jQuery.ajax({
		url: RutaEditarZona,
		method: 'get',
		data: {
			_token: CSRF_TOKEN,
			hdnZonId: $("#ddlZonaReserva").val()
		},
		dataType: 'JSON',
		success: function(result){


			for(iFilas = 1; iFilas < result[0].zon_filas;iFilas++)
			{
				$("#ddlFilaReserva").append('<option value="F' + iFilas + '">F' + iFilas + '</option>');
			}

			for(iFilas = 1; iFilas < result[0].zon_filas;iFilas++)
			{
				$("#ddlSillaReserva").append('<option value="S' + iFilas + '">S' + iFilas + '</option>');
			}

		}});
}