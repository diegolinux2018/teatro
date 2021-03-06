<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Models\TblZona;
use App\Models\TblTeatro;

class ZonaController extends Controller
{
	//Lista los teatos
	public function listar()
	{
//->select('zon_id','tbl_teatro.tea_nombre','zon_nombre','zon_filas','zon_sillas')
		return Datatables::of(TblZona::join("tbl_teatro","tbl_teatro.tea_id","=","tbl_zona.tea_id")->get())->addColumn('action', function ($faculties) {
            		return '<a href="javascript://" onclick="EditarZona('.$faculties->zon_id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>
				<a href="javascript://" onclick="EliminaZona('.$faculties->zon_id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Eliminar</a> ';})
        	->make(true);

	}

	//Fecha:01-11-2018
	//Creado por:Diedo Rojas
	//Function encargada de validar los datos no se repitan
	//Crea la instancia del modelo y guarda los datos a la base de datos
	public function guardar(Request $request)
	{
		if( TblZona::where(['zon_nombre'=>$request->txtNombreZona,'tea_id' => $request->ddlTeatro])->count() > 0 )
		{
			$objZona = TblZona::where(['zon_nombre'=>$request->txtNombreZona,'tea_id' => $request->ddlTeatro])->get()[0];

			if($objZona->zon_id != $request->hdnZonId)
			{
				return response()->json(['success'=>'Ya existe el teatro']);
			}
		}
		else
		{		

			if( $request->hdnZonId == 0 )
			{
				$objZona = new TblZona;
			}
			else
			{
				$objZona = TblZona::where(['zon_id'=>$request->hdnZonId])->get()[0];
			}
		}

		$objZona->zon_id = $request->hdnZonId;
		$objZona->zon_nombre = $request->txtNombreZona;
		$objZona->zon_filas = $request->txtFilasZona;
		$objZona->zon_sillas = $request->txtSillasZona;
		$objZona->tea_id = $request->ddlTeatro;
		$objZona->save();

		return response()->json(['success'=>'Se guardo con exito']);
	}

	//Fecha:01-11-2018
	//Creado por:Diedo Rojas
	//Function encargada de buscar los datos a editar
	public function editar(Request $request)
	{
		return response()->json(TblZona::where(['zon_id'=>$request->hdnZonId])->get());
	}

	//Fecha:01-11-2018
	//Creado por:Diedo Rojas
	//Function encargada de consultar todos las zonas creados
	public function get_zonas(Request $request)
	{
		return response()->json(TblZona::where(['tea_id'=>$request->idTea])->get());
	}

	//Fecha:01-11-2018
	//Creado por:Diedo Rojas
	//Function encargada de buscar los datos a editar
	public function eliminar(Request $request)
	{
		$objZona = TblZona::where(['zon_id'=>$request->hdnZonId])->get()[0];
		$objZona->delete();

		return response()->json(['success'=>'Se elimino con exito']);
	}
}