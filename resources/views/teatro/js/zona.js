//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion al ejecutarce despues de que carga la pagina y realiza las acciones de dibujar las tablas
//Asocia las funciones a los botones

$(document).ready(function ()
{
	//Data table, lista uusarios
	$('#tblZona').DataTable({
		processing: true,
		serverSide: true,
		ajax: RutaListarZona,
		columns: [
		{ data: 'zon_id', name: 'zon_id' },
		{ data: 'tea_nombre', name: 'tea_nombre' },
		{ data: 'zon_nombre', name: 'zon_nombre' },
		{ data: 'zon_filas', name: 'zon_filas' },
		{ data: 'zon_sillas', name: 'zon_sillas' },
		{data: 'action', name: 'action'}
		]
	});
	//Asigno las funciones a cada evento
	$("#btnNuevoZona").on('click',cleanFormZona);
	$("#btnGuardarZona").on('click',GuardarRegistroZona);
	getTeatros();
});

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que limpia el formulario cuando se da click en el boton de nuevo
function cleanFormZona()
{	
	var $inputs = $('#formularioZona  :input');
	$inputs.each(function ()
	{
		$(this).val("");
	});
	$("#hdnZonId").val("0");
	getTeatros();
}


//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion carcardatos
//Envia por get el id del registro
function EditarZona(id)
{
	jQuery.ajax({
		url: RutaEditarZona,
		method: 'get',
		data: {
			_token: CSRF_TOKEN,
			hdnZonId: id,
		},
		dataType: 'JSON',
		success: function(result){
			$('#modal-zona').modal();
			jQuery('#hdnZonId').val(result[0].zon_id);
			jQuery('#txtNombreZona').val(result[0].zon_nombre);
			jQuery('#txtFilasZona').val(result[0].zon_filas);
			jQuery('#txtSillasZona').val(result[0].zon_sillas);
			jQuery('#ddlTeatro').val(result[0].tea_id);
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion de eliminar un registro
//Envia por get el id del registro
function EliminaZona(id)
{
	jQuery.ajax({
		url: RutaEliminarZona,
		method: 'post',
		data: {
			_token: CSRF_TOKEN,
			hdnZonId: id,
		},
		dataType: 'JSON',
		success: function(result){
			$('#tblZona').DataTable().ajax.reload(); 
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//FUncion que llama la funcion guardardatos
//Envia los datos del formulario y realiza las validaciones
function GuardarRegistroZona()
{
	$("#formularioZona").validate({
		rules: {
			ddlTeatro:"required",
			txtNombreZona: {
				required: true,
				minlength: 3,
				maxlength: 50
			},
			txtFilasZona: {
				required: true,
				range:[1,5]
			},
			txtSillasZona: {
				required: true,
				range:[1,10]
			}
		
		},
		messages: {
			ddlTeatro: "Seleccione un teatro",
			txtNombreZona: {
				required: "Campo obligatorio",
				minlength: "Minimo 3 letras",
				maxlength: "Maximo 50 letras"
			},
			txtFilasZona: {
				required: "Campo obligatorio",
				range: "solo valores entre 1 y 5"
			},
			txtSillasZona: {
				required: "Campo obligatorio",
				range: "solo valores entre 1 y 10"
			},
		},
	});

	if( !$("#formularioZona").valid() )
	{
		return false;
	}

	jQuery.ajax({
		url: RutaGuardarZona,
		method: 'post',
		data: {
			_token: CSRF_TOKEN,
			hdnZonId: jQuery('#hdnZonId').val(),
			txtNombreZona: jQuery('#txtNombreZona').val(),
			txtFilasZona: jQuery('#txtFilasZona').val(),
			txtSillasZona: jQuery('#txtSillasZona').val(),
			ddlTeatro: jQuery('#ddlTeatro').val()			
		},
		dataType: 'JSON',
		success: function(result){
			alert(result.success);
			$('#tblZona').DataTable().ajax.reload(); 
			$('#modal-zona').modal("hide");
			//console.log(result);
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion de traer todos los teatros creados
//Envia por get el id del registro
function getTeatros()
{
	$("#ddlTeatro").children('option:not(:first)').remove();
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
				$("#ddlTeatro").append('<option value="' + data.tea_id + '">' + data.tea_nombre + '</option>');
			});

		}});
}