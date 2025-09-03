<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prescription
 * 
 * @property int $id
 * @property int|null $appointment_id
 * @property string|null $medication
 * @property string|null $dosage
 * @property string|null $instructions
 *
 * @package App\Models
 */
class Prescription extends Model
{
	protected $table = 'prescriptions';
	public $timestamps = false;

	protected $casts = [
		'appointment_id' => 'int'
	];

	protected $fillable = [
		'appointment_id',
		'medication',
		'dosage',
		'instructions'
	];
}
