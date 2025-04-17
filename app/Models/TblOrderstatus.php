<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblOrderstatus
 * 
 * @property int $StatusID
 * @property string $StatusDescription
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TblCarrentailorder[] $tbl_carrentailorders
 *
 * @package App\Models
 */
class TblOrderstatus extends Model
{
	protected $table = 'tbl_orderstatus';
	protected $primaryKey = 'StatusID';

	protected $fillable = [
		'StatusDescription'
	];

	public function tbl_carrentailorders()
	{
		return $this->hasMany(TblCarrentailorder::class, 'StatusID');
	}
}
