<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Nov 2018 11:18:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblPerfil
 * 
 * @property int $prf_id
 * @property int $prf_nombre
 *
 * @package App\Models
 */
class TblPerfil extends Eloquent
{
	protected $table = 'tbl_perfil';
	protected $primaryKey = 'prf_id';
	public $timestamps = false;

	protected $casts = [
		'prf_nombre' => 'int'
	];

	protected $fillable = [
		'prf_nombre'
	];
}
