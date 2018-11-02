//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion al ejecutarce despues de que carga la pagina y realiza las acciones de dibujar las tablas
//Asocia las funciones a los botones

$(document).ready(function ()
{
	//Data table, lista uusarios
	$('#tblTeatro').DataTable({
		processing: true,
		serverSide: true,
		ajax: RutaListar,
		columns: [
		{ data: 'tea_id', name: 'tea_id' },
		{ data: 'tea_nombre', name: 'tea_nombre' },
		{ data: 'tea_direccion', name: 'tea_direccion' },
		{data: 'action', name: 'action'}
		]
	});
	//Asigno las funciones a cada evento
	$("#btnNuevoTeatro").on('click',cleanFormTeatro);
	$("#btnGuardarTeatro").on('click',GuardarRegistroTeatro);
});

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que limpia el formulario cuando se da click en el boton de nuevo
function cleanFormTeatro()
{	
	var $inputs = $('#formulario  :input');
	$inputs.each(function ()
	{
		$(this).val("");
	});
	$("#hdnTeaId").val("0");
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion carcardatos
//Envia por get el id del registro
function EditarTeatro(id)
{
	jQuery.ajax({
		url: RutaEditar,
		method: 'get',
		data: {
			_token: CSRF_TOKEN,
			hdnTeaId: id,
		},
		dataType: 'JSON',
		success: function(result){
			$('#modal-registro').modal();
			jQuery('#hdnTeaId').val(result[0].tea_id);
			jQuery('#txtNombre').val(result[0].tea_nombre);
			jQuery('#txtDireccion').val(result[0].tea_direccion);
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//Funcion que llama la funcion de eliminar un registro
//Envia por get el id del registro
function EliminaTeatro(id)
{
	jQuery.ajax({
		url: RutaEliminar,
		method: 'post',
		data: {
			_token: CSRF_TOKEN,
			hdnTeaId: id,
		},
		dataType: 'JSON',
		success: function(result){
			alert(result.success);
			$('#tblTeatro').DataTable().ajax.reload(); 
		}});
}

//Fecha:01-11-2018
//Creado por:Diedo Rojas
//FUncion que llama la funcion guardardatos
//Envia los datos del formulario y realiza las validaciones
function GuardarRegistroTeatro()
{
	$("#formulario").validate({
		rules: {
			txtNombre: {
				required: true,
				minlength: 3,
				maxlength: 50
			},
			txtDireccion: {
				required: true,
				minlength: 3,
				maxlength: 150
			}
		
		},
		messages: {
			txtNombre: {
				required: "Campo obligatorio",
				minlength: "Minimo 3 letras",
				maxlength: "Maximo 50 letras"
			},
			txtDireccion: {
				required: "Campo obligatorio",
				minlength: "Minimo 3 letras",
				maxlength: "Maximo 50 letras"
			},
		},
	});

	if( !$("#formulario").valid() )
	{
		return false;
	}

	jQuery.ajax({
		url: RutaGuardar,
		method: 'post',
		data: {
			_token: CSRF_TOKEN,
			hdnTeaId: jQuery('#hdnTeaId').val(),
			txtNombre: jQuery('#txtNombre').val(),
			txtDireccion: jQuery('#txtDireccion').val()
		},
		dataType: 'JSON',
		success: function(result){
			alert(result.success);
			$('#tblTeatro').DataTable().ajax.reload();
			getTeatros();
			$('#modal-registro').modal("hide");
			//console.log(result);
		}});
}