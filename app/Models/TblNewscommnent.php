<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblNewscommnent
 * 
 * @property int $NewsCommentID
 * @property string|null $Name
 * @property string|null $Phone
 * @property string|null $Email
 * @property Carbon|null $CreatedDate
 * @property string|null $Detail
 * @property int|null $NewsID
 * @property bool|null $isActive
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TblNews|null $tbl_news
 *
 * @package App\Models
 */
class TblNewscommnent extends Model
{
	protected $table = 'tbl_newscommnent';
	protected $primaryKey = 'NewsCommentID';

	protected $casts = [
		'CreatedDate' => 'datetime',
		'NewsID' => 'int',
		'isActive' => 'bool'
	];

	protected $fillable = [
		'Name',
		'Phone',
		'Email',
		'CreatedDate',
		'Detail',
		'NewsID',
		'isActive'
	];

	public function tbl_news()
	{
		return $this->belongsTo(TblNews::class, 'NewsID');
	}
}
