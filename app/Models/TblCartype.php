<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblCartype
 * 
 * @property int $TypeID
 * @property string $CarTypeName
 * @property int $Seats
 * @property string|null $Manufacturer
 * @property string|null $Image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TblCar[] $tbl_cars
 * @property Collection|Tblcontracdetail[] $tblcontracdetails
 *
 * @package App\Models
 */
class TblCartype extends Model
{
	protected $table = 'tbl_cartypes';
	protected $primaryKey = 'TypeID';

	protected $casts = [
		'Seats' => 'int'
	];

	protected $fillable = [
		'CarTypeName',
		'Seats',
		'Manufacturer',
		'Image'
	];

	public function tbl_cars()
	{
		return $this->hasMany(TblCar::class, 'TypeID');
	}

	public function tblcontracdetails()
	{
		return $this->hasMany(Tblcontracdetail::class, 'TypeID');
	}
}
