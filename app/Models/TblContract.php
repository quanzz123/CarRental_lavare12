<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblContract
 * 
 * @property int $ContractID
 * @property int|null $CustomerID
 * @property Carbon|null $Date
 * @property string|null $Content
 * @property string|null $GeneralTerms
 * @property string|null $SpecificTerms
 * @property float|null $AdvancePayment
 * 
 * @property TblCustomer|null $tbl_customer
 * @property Collection|TblContractsettlement[] $tbl_contractsettlements
 * @property Collection|Tblcontracdetail[] $tblcontracdetails
 *
 * @package App\Models
 */
class TblContract extends Model
{
	protected $table = 'tbl_contract';
	protected $primaryKey = 'ContractID';
	public $timestamps = false;

	protected $casts = [
		'CustomerID' => 'int',
		'Date' => 'datetime',
		'AdvancePayment' => 'float'
	];

	protected $fillable = [
		'CustomerID',
		'Date',
		'Content',
		'GeneralTerms',
		'SpecificTerms',
		'AdvancePayment'
	];

	public function tbl_customer()
	{
		return $this->belongsTo(TblCustomer::class, 'CustomerID');
	}

	public function tbl_contractsettlements()
	{
		return $this->hasMany(TblContractsettlement::class, 'ContractID');
	}

	public function tblcontracdetails()
	{
		return $this->hasMany(Tblcontracdetail::class, 'ContractID');
	}
}
