<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property string|null $role
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'role'
	];

public function isAdmin()
{
    return $this->role === 'admin';
}

public function isDoctor()
{
    return $this->role === 'doctor';
}

public function isReceptionist()
{
    return $this->role === 'receptionist';
}

}
