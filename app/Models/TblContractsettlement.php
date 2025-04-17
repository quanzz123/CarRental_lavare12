<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblContractsettlement
 * 
 * @property int $SettlementID
 * @property int|null $ContractID
 * @property Carbon|null $Date
 * @property string|null $PaymentMethod
 * @property int|null $TotalCarsRented
 * @property float|null $AdvancePayment
 * @property float|null $TotalPayment
 * @property float|null $PaidAmount
 * @property string|null $Notes
 * 
 * @property TblContract|null $tbl_contract
 * @property Collection|TblContractsettlementdetail[] $tbl_contractsettlementdetails
 *
 * @package App\Models
 */
class TblContractsettlement extends Model
{
	protected $table = 'tbl_contractsettlements';
	protected $primaryKey = 'SettlementID';
	public $timestamps = false;

	protected $casts = [
		'ContractID' => 'int',
		'Date' => 'datetime',
		'TotalCarsRented' => 'int',
		'AdvancePayment' => 'float',
		'TotalPayment' => 'float',
		'PaidAmount' => 'float'
	];

	protected $fillable = [
		'ContractID',
		'Date',
		'PaymentMethod',
		'TotalCarsRented',
		'AdvancePayment',
		'TotalPayment',
		'PaidAmount',
		'Notes'
	];

	public function tbl_contract()
	{
		return $this->belongsTo(TblContract::class, 'ContractID');
	}

	public function tbl_contractsettlementdetails()
	{
		return $this->hasMany(TblContractsettlementdetail::class, 'SettlementID');
	}
}
