<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property int|null $appointment_id
 * @property float|null $total_amount
 * @property string|null $payment_status
 * @property Carbon|null $issued_at
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';
	public $timestamps = false;

	protected $casts = [
		'appointment_id' => 'int',
		'total_amount' => 'float',
		'issued_at' => 'datetime'
	];

	protected $fillable = [
		'appointment_id',
		'total_amount',
		'payment_status',
		'issued_at'
	];
}
