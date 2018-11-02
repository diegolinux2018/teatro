<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 02 Nov 2018 11:18:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TblTipoDocumento
 * 
 * @property int $tid_id
 * @property string $tid_nombre
 * @property string $tid_abrevacion
 *
 * @package App\Models
 */
class TblTipoDocumento extends Eloquent
{
	protected $table = 'tbl_tipo_documento';
	protected $primaryKey = 'tid_id';
	public $timestamps = false;

	protected $fillable = [
		'tid_nombre',
		'tid_abrevacion'
	];
}
