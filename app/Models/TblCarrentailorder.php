<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblCarrentailorder
 * 
 * @property int $OrderID
 * @property int|null $CustomerID
 * @property Carbon|null $OrderDate
 * @property float|null $Deposit
 * @property float|null $Payment
 * @property int|null $StatusID
 * @property Carbon|null $ReturnDate
 * @property string|null $Notes
 * 
 * @property TblCustomer|null $tbl_customer
 * @property TblOrderstatus|null $tbl_orderstatus
 * @property Collection|TblOrderdetail[] $tbl_orderdetails
 *
 * @package App\Models
 */
class TblCarrentailorder extends Model
{
	protected $table = 'tbl_carrentailorders';
	protected $primaryKey = 'OrderID';
	public $timestamps = false;

	protected $casts = [
		'CustomerID' => 'int',
		'OrderDate' => 'datetime',
		'Deposit' => 'float',
		'Payment' => 'float',
		'StatusID' => 'int',
		'ReturnDate' => 'datetime'
	];

	protected $fillable = [
		'CustomerID',
		'OrderDate',
		'Deposit',
		'Payment',
		'StatusID',
		'ReturnDate',
		'Notes'
	];

	public function tbl_customer()
	{
		return $this->belongsTo(TblCustomer::class, 'CustomerID');
	}

	public function tbl_orderstatus()
	{
		return $this->belongsTo(TblOrderstatus::class, 'StatusID');
	}

	public function tbl_orderdetails()
	{
		return $this->hasMany(TblOrderdetail::class, 'OrderID');
	}
}
