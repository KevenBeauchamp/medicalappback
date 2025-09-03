<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LabResult
 * 
 * @property int $id
 * @property int|null $patient_id
 * @property int|null $appointment_id
 * @property string|null $file_path
 * @property string|null $description
 * @property int|null $uploaded_by
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class LabResult extends Model
{
	protected $table = 'lab_results';
	public $timestamps = false;

	protected $casts = [
		'patient_id' => 'int',
		'appointment_id' => 'int',
		'uploaded_by' => 'int'
	];

	protected $fillable = [
		'patient_id',
		'appointment_id',
		'file_path',
		'description',
		'uploaded_by'
	];
}
