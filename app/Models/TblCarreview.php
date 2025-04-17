<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblCarreview
 * 
 * @property int $CarReviewID
 * @property string|null $Name
 * @property string|null $Phone
 * @property string|null $Email
 * @property Carbon|null $CreatedDate
 * @property string|null $Detail
 * @property int|null $CarID
 * @property int|null $Star
 * @property bool|null $IsActive
 * 
 * @property TblCar|null $tbl_car
 *
 * @package App\Models
 */
class TblCarreview extends Model
{
	protected $table = 'tbl_carreviews';
	protected $primaryKey = 'CarReviewID';
	public $timestamps = false;

	protected $casts = [
		'CreatedDate' => 'datetime',
		'CarID' => 'int',
		'Star' => 'int',
		'IsActive' => 'bool'
	];

	protected $fillable = [
		'Name',
		'Phone',
		'Email',
		'CreatedDate',
		'Detail',
		'CarID',
		'Star',
		'IsActive'
	];

	public function tbl_car()
	{
		return $this->belongsTo(TblCar::class, 'CarID');
	}
}
