<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblCar
 * 
 * @property int $CarID
 * @property string|null $CarName
 * @property int|null $Seat
 * @property string|null $LicensePlate
 * @property float|null $Price
 * @property string|null $Color
 * @property int|null $Model
 * @property float|null $Rate
 * @property string|null $CarBrand
 * @property string|null $Image
 * @property float|null $SalePrice
 * @property string|null $Alias
 * @property bool $IsSale
 * @property bool $IsActive
 * @property string|null $Details
 * @property string|null $Descriptions
 * @property int|null $TypeID
 * 
 * @property TblCartype|null $tbl_cartype
 * @property Collection|TblCarreview[] $tbl_carreviews
 *
 * @package App\Models
 */
class TblCar extends Model
{
	protected $table = 'tbl_cars';
	protected $primaryKey = 'CarID';
	public $timestamps = false;

	protected $casts = [
		'Seat' => 'int',
		'Price' => 'float',
		'Model' => 'int',
		'Rate' => 'float',
		'SalePrice' => 'float',
		'IsSale' => 'bool',
		'IsActive' => 'bool',
		'TypeID' => 'int'
	];

	protected $fillable = [
		'CarName',
		'Seat',
		'LicensePlate',
		'Price',
		'Color',
		'Model',
		'Rate',
		'CarBrand',
		'Image',
		'SalePrice',
		'Alias',
		'IsSale',
		'IsActive',
		'Details',
		'Descriptions',
		'TypeID'
	];

	public function tbl_cartype()
	{
		return $this->belongsTo(TblCartype::class, 'TypeID');
	}

	public function tbl_carreviews()
	{
		return $this->hasMany(TblCarreview::class, 'CarID');
	}
}
