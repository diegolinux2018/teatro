<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Nov 2018 09:20:39 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblUsuario
 * 
 * @property int $usu_id
 * @property string $usu_identificacion
 * @property int $usu_nombre
 * @property int $usu_apellido
 * @property string $usu_telefono
 * @property string $udu_direccion
 * @property int $usu_usuario
 * @property int $usu_contrasena
 * @property int $tid_id
 * @property int $prf_id
 * 
 * @property \App\Models\TblPerfil $tbl_perfil
 * @property \App\Models\TblTipoDocumento $tbl_tipo_documento
 *
 * @package App\Models
 */
class TblUsuario extends Eloquent
{
	protected $table = 'tbl_usuario';
	protected $primaryKey = 'usu_id';
	public $timestamps = false;

	protected $casts = [
		'usu_nombre' => 'int',
		'usu_apellido' => 'int',
		'usu_usuario' => 'int',
		'usu_contrasena' => 'int',
		'tid_id' => 'int',
		'prf_id' => 'int'
	];

	protected $fillable = [
		'usu_identificacion',
		'usu_nombre',
		'usu_apellido',
		'usu_telefono',
		'udu_direccion',
		'usu_usuario',
		'usu_contrasena',
		'tid_id',
		'prf_id'
	];

	public function tbl_perfil()
	{
		return $this->belongsTo(\App\Models\TblPerfil::class, 'prf_id');
	}

	public function tbl_tipo_documento()
	{
		return $this->belongsTo(\App\Models\TblTipoDocumento::class, 'tid_id');
	}
}
