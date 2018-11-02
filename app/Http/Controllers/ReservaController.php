<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use App\Models\TblReserva;
use App\Models\TblTeatro;
use App\Http\Controllers\Auth;


class ReservaController extends Controller
{
	public function Index()
	{
		return view("reserva.formRserva");
	}

	//Lista los teatos
	public function listar()
	{
		return Datatables::of(TblReserva::join("tbl_zona","tbl_zona.zon_id","tbl_reserva.zon_id")->join("tbl_teatro","tbl_teatro.tea_id","=","tbl_zona.tea_id")->get())->addColumn('action', function ($faculties) {
            		return '<a href="javascript://" onclick="EditarReserva('.$faculties->zon_id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>
				<a href="javascript://" onclick="EliminaReserva('.$faculties->zon_id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> Eliminar</a> ';})
        	->make(true);

	}

	//Fecha:01-11-2018
	//Creado por:Diedo Rojas
	//Function encargada de validar los datos no se repitan
	//Crea la instancia del modelo y guarda los datos a la base de datos
	public function guardar(Request $request)
	{
		if( TblReserva::where([['res_aciento','like','%'.$request->Aciento.'%'],['zon_id','=', $request->ddlZona]])->count() > 0 )
		{
				return response()->json(['success'=>'El asciento ya esta asignado']);
		}

		if( $request->hdnResId == 0 )
		{
			$objReserva = new TblReserva;
		}
		else
		{
			$objReserva = TblReserva::where(['res_id'=>$request->hdnResId])->get()[0];
		}

		$objReserva->res_id = $request->hdnResId;
		$objReserva->res_fecha = $request->txtFechaReserva;
		$objReserva->res_aciento = $objReserva->res_aciento.$request->Aciento.";";
		$objReserva->zon_id = $request->ddlZona;
		$objReserva->user_id = $request->user()->id;
		$objReserva->save();

		$arc = fopen("logResrvas.log","a+");
		fwrite ($arc,date("Y-m-d").":".$request->hdnResId.":".$request->txtFechaReserva.":".$objReserva->res_aciento.":".$request->ddlZona.$request->user()->id."\n");
		fclose($arc);

		return response()->json(['success'=>'Se guardo con exito','idRes' => $objReserva->res_id,"seleccionadas"=>$objReserva->res_aciento]);
	}

	//Fecha:01-11-2018
	//Creado por:Diedo Rojas
	//Function encargada de buscar los datos a editar
	public function editar(Request $request)
	{
		return response()->json(TblReserva::where(['res_id'=>$request->hdnResId])->get());
	}

	//Fecha:01-11-2018
	//Creado por:Diedo Rojas
	//Function encargada de buscar los datos a editar
	public function eliminar(Request $request)
	{
		$objReserva = TblReserva::where(['zon_id'=>$request->hdnResId])->get()[0];
		$objReserva->delete();

		return response()->json(['success'=>'Se elimino con exito']);
	}
}