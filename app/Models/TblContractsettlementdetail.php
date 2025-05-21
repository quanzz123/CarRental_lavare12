<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblContractsettlementdetail
 * 
 * @property int $SettlementDetailID
 * @property int|null $SettlementID
 * @property int $CarID
 * @property Carbon|null $ReceiveDate
 * @property Carbon|null $ReturnDate
 * @property float|null $Price
 * @property float|null $Total
 * 
 * @property TblContractsettlement|null $tbl_contractsettlement
 *
 * @package App\Models
 */
class TblContractsettlementdetail extends Model
{
	protected $table = 'tbl_contractsettlementdetails';
	protected $primaryKey = 'SettlementDetailID';
	public $timestamps = false;

	protected $casts = [
		'SettlementID' => 'int',
		'CarID' => 'int',
		'ReceiveDate' => 'datetime',
		'ReturnDate' => 'datetime',
		'Price' => 'float',
		'Total' => 'float'
	];

	protected $fillable = [
		'SettlementID',
		'CarID',
		'ReceiveDate',
		'ReturnDate',
		'Price',
		'Total'
	];

	public function tbl_contractsettlement()
	{
		return $this->belongsTo(TblContractsettlement::class, 'SettlementID');
	}
}
