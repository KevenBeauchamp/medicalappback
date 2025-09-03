<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Appointment
 * 
 * @property int $id
 * @property int|null $patient_id
 * @property int|null $doctor_id
 * @property Carbon|null $date_time
 * @property string|null $status
 * @property string|null $reason
 *
 * @package App\Models
 */
class Appointment extends Model
{
	protected $table = 'appointments';
	public $timestamps = false;

	protected $casts = [
		'patient_id' => 'int',
		'doctor_id' => 'int',
		'date_time' => 'datetime'
	];

	protected $fillable = [
		'patient_id',
		'doctor_id',
		'date_time',
		'status',
		'reason'
	];
}
