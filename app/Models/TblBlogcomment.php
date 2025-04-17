<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblBlogcomment
 * 
 * @property int $CommentID
 * @property string|null $Name
 * @property string|null $Phone
 * @property string|null $Email
 * @property Carbon|null $CreatedDate
 * @property string|null $Detail
 * @property int|null $BlogID
 * @property bool $IsActive
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TblBlog|null $tbl_blog
 *
 * @package App\Models
 */
class TblBlogcomment extends Model
{
	protected $table = 'tbl_blogcomment';
	protected $primaryKey = 'CommentID';

	protected $casts = [
		'CreatedDate' => 'datetime',
		'BlogID' => 'int',
		'IsActive' => 'bool'
	];

	protected $fillable = [
		'Name',
		'Phone',
		'Email',
		'CreatedDate',
		'Detail',
		'BlogID',
		'IsActive'
	];

	public function tbl_blog()
	{
		return $this->belongsTo(TblBlog::class, 'BlogID');
	}
}
