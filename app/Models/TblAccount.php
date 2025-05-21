<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblAccount
 * 
 * @property int $AccountID
 * @property string|null $UserName
 * @property string|null $PassWord
 * @property string|null $FullName
 * @property string|null $Phone
 * @property string|null $Email
 * @property int|null $RoleID
 * @property bool|null $IsActive
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TblRole|null $tbl_role
 * @property Collection|TblBlog[] $tbl_blogs
 *
 * @package App\Models
 */
class TblAccount extends Model
{
	protected $table = 'tbl_account';
	protected $primaryKey = 'AccountID';

	protected $casts = [
		'RoleID' => 'int',
		'IsActive' => 'bool'
	];

	protected $fillable = [
		'UserName',
		'PassWord',
		'FullName',
		'Phone',
		'Email',
		'RoleID',
		'IsActive'
	];

	public function tbl_role()
	{
		return $this->belongsTo(TblRole::class, 'RoleID');
	}

	public function tbl_blogs()
	{
		return $this->hasMany(TblBlog::class, 'AccountID');
	}
}
