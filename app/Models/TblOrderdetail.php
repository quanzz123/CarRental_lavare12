<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblOrderdetail
 * 
 * @property int $OrderDetailID
 * @property int|null $OrderID
 * @property int $CarID
 * @property string|null $Description
 * @property float|null $Price
 * @property int|null $Quantity
 * @property Carbon|null $PickupDate
 * @property Carbon|null $ReturnDate
 * 
 * @property TblCarrentailorder|null $tbl_carrentailorder
 *
 * @package App\Models
 */
class TblOrderdetail extends Model
{
	protected $table = 'tbl_orderdetails';
	protected $primaryKey = 'OrderDetailID';
	public $timestamps = false;

	protected $casts = [
		'OrderID' => 'int',
		'CarID' => 'int',
		'Price' => 'float',
		'Quantity' => 'int',
		'PickupDate' => 'datetime',
		'ReturnDate' => 'datetime'
	];

	protected $fillable = [
		'OrderID',
		'CarID',
		'Description',
		'Price',
		'Quantity',
		'PickupDate',
		'ReturnDate'
	];

	public function tbl_carrentailorder()
	{
		return $this->belongsTo(TblCarrentailorder::class, 'OrderID');
	}
}
