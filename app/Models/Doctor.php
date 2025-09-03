<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctor
 * 
 * @property int $id
 * @property string|null $specialty
 * @property string|null $license_number
 *
 * @package App\Models
 */
class Doctor extends Model
{
	protected $table = 'doctors';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'specialty',
		'license_number'
	];
}
