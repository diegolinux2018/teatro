<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Nov 2018 11:18:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblZona
 * 
 * @property int $zon_id
 * @property string $zon_nombre
 * @property int $zon_sillas
 * @property int $zon_filas
 * @property int $tea_id
 * 
 * @property \App\Models\TblTeatro $tbl_teatro
 * @property \Illuminate\Database\Eloquent\Collection $tbl_reservas
 *
 * @package App\Models
 */
class TblZona extends Eloquent
{
	protected $table = 'tbl_zona';
	protected $primaryKey = 'zon_id';
	public $timestamps = false;

	protected $casts = [
		'zon_sillas' => 'int',
		'zon_filas' => 'int',
		'tea_id' => 'int'
	];

	protected $fillable = [
		'zon_nombre',
		'zon_sillas',
		'zon_filas',
		'tea_id'
	];

	public function tbl_teatro()
	{
		return $this->belongsTo(\App\Models\TblTeatro::class, 'tea_id');
	}

	public function tbl_reservas()
	{
		return $this->hasMany(\App\Models\TblReserva::class, 'zon_id');
	}
}
