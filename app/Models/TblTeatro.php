<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Nov 2018 11:18:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblTeatro
 * 
 * @property int $tea_id
 * @property string $tea_nombre
 * @property string $tea_direccion
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tbl_zonas
 *
 * @package App\Models
 */
class TblTeatro extends Eloquent
{
	protected $table = 'tbl_teatro';
	protected $primaryKey = 'tea_id';
	public $timestamps = false;

	protected $fillable = [
		'tea_nombre',
		'tea_direccion'
	];

	public function tbl_zonas()
	{
		return $this->hasMany(\App\Models\TblZona::class, 'tea_id');
	}
}
