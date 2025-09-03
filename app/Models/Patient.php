<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patient
 * 
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property Carbon|null $dob
 * @property string|null $gender
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class Patient extends Model
{
	protected $table = 'patients';
	public $timestamps = false;

	protected $casts = [
		'dob' => 'datetime'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'dob',
		'gender',
		'phone',
		'email',
		'address'
	];
}
