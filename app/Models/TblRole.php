<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblRole
 * 
 * @property int $RoleID
 * @property string|null $RoleName
 * @property string|null $Descriptiom
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TblAccount[] $tbl_accounts
 *
 * @package App\Models
 */
class TblRole extends Model
{
	protected $table = 'tbl_role';
	protected $primaryKey = 'RoleID';

	protected $fillable = [
		'RoleName',
		'Descriptiom'
	];

	public function tbl_accounts()
	{
		return $this->hasMany(TblAccount::class, 'RoleID');
	}
}
