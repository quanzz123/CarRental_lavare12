<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblcontracdetail
 * 
 * @property int $ContractDetailID
 * @property int|null $ContractID
 * @property int|null $TypeID
 * @property int|null $Quantity
 * @property float|null $Price
 * @property Carbon|null $ReceiveDate
 * @property Carbon|null $ReturnDate
 * @property string|null $Notes
 * 
 * @property TblContract|null $tbl_contract
 * @property TblCartype|null $tbl_cartype
 *
 * @package App\Models
 */
class Tblcontracdetail extends Model
{
	protected $table = 'tblcontracdetails';
	protected $primaryKey = 'ContractDetailID';
	public $timestamps = false;

	protected $casts = [
		'ContractID' => 'int',
		'TypeID' => 'int',
		'Quantity' => 'int',
		'Price' => 'float',
		'ReceiveDate' => 'datetime',
		'ReturnDate' => 'datetime'
	];

	protected $fillable = [
		'ContractID',
		'TypeID',
		'Quantity',
		'Price',
		'ReceiveDate',
		'ReturnDate',
		'Notes'
	];

	public function tbl_contract()
	{
		return $this->belongsTo(TblContract::class, 'ContractID');
	}

	public function tbl_cartype()
	{
		return $this->belongsTo(TblCartype::class, 'TypeID');
	}
}
