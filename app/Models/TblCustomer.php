<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class TblCustomer
 * 
 * @property int $CustomerID
 * @property string|null $FullName
 * @property string|null $Name
 * @property string|null $Password
 * @property string|null $Email
 * @property Carbon|null $DateofBirth
 * @property string|null $Address
 * @property string|null $LicenseNumber
 * @property string|null $LicenseImage
 * @property string|null $IDCard
 * @property string|null $PhoneNumber
 * @property string|null $AccountNumber
 * @property string|null $Bank
 * @property string|null $CompanyName
 * @property string|null $Avartar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TblCarrentailorder[] $tbl_carrentailorders
 * @property Collection|TblContract[] $tbl_contracts
 *
 * @package App\Models
 */
class TblCustomer extends Authenticatable
{
	use HasApiTokens, Notifiable;
	
	protected $table = 'tbl_customer';
	protected $primaryKey = 'CustomerID';

	protected $casts = [
		'DateofBirth' => 'datetime'
	];

	protected $fillable = [
		'FullName',
		'Name',
		'Password',
		'Email',
		'DateofBirth',
		'Address',
		'LicenseNumber',
		'LicenseImage',
		'IDCard',
		'PhoneNumber',
		'AccountNumber',
		'Bank',
		'CompanyName',
		'Avartar'
	];

	public function tbl_carrentailorders()
	{
		return $this->hasMany(TblCarrentailorder::class, 'CustomerID');
	}

	public function tbl_contracts()
	{
		return $this->hasMany(TblContract::class, 'CustomerID');
	}
	public function getAuthPassword()
	{
		return $this->Password;
	}

}
