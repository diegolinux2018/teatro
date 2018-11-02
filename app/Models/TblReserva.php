<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Nov 2018 11:18:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblReserva
 * 
 * @property int $res_id
 * @property \Carbon\Carbon $res_fecha
 * @property string $res_aciento
 * @property int $zon_id
 * @property int $user_id
 * 
 * @property \App\Models\TblZona $tbl_zona
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class TblReserva extends Eloquent
{
	protected $table = 'tbl_reserva';
	protected $primaryKey = 'res_id';
	public $timestamps = false;

	protected $casts = [
		'zon_id' => 'int',
		'user_id' => 'int'
	];

	protected $dates = [
		'res_fecha'
	];

	protected $fillable = [
		'res_fecha',
		'res_aciento',
		'zon_id',
		'user_id'
	];

	public function tbl_zona()
	{
		return $this->belongsTo(\App\Models\TblZona::class, 'zon_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
