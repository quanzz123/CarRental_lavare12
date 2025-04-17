<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblBlog
 * 
 * @property int $BlogID
 * @property string|null $Title
 * @property string|null $Alias
 * @property int|null $CategoryId
 * @property string|null $Description
 * @property string|null $Detail
 * @property string|null $Image
 * @property string|null $SeoTitle
 * @property string|null $SeoDescription
 * @property string|null $SeoKeywords
 * @property Carbon|null $CreatedDate
 * @property string|null $CreatedBy
 * @property Carbon|null $ModifiedDate
 * @property string|null $ModifiedBy
 * @property int|null $AccountID
 * @property bool $IsActive
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TblAccount|null $tbl_account
 * @property Collection|TblBlogcomment[] $tbl_blogcomments
 *
 * @package App\Models
 */
class TblBlog extends Model
{
	protected $table = 'tbl_blog';
	protected $primaryKey = 'BlogID';

	protected $casts = [
		'CategoryId' => 'int',
		'CreatedDate' => 'datetime',
		'ModifiedDate' => 'datetime',
		'AccountID' => 'int',
		'IsActive' => 'bool'
	];

	protected $fillable = [
		'Title',
		'Alias',
		'CategoryId',
		'Description',
		'Detail',
		'Image',
		'SeoTitle',
		'SeoDescription',
		'SeoKeywords',
		'CreatedDate',
		'CreatedBy',
		'ModifiedDate',
		'ModifiedBy',
		'AccountID',
		'IsActive'
	];

	public function tbl_account()
	{
		return $this->belongsTo(TblAccount::class, 'AccountID');
	}

	public function tbl_blogcomments()
	{
		return $this->hasMany(TblBlogcomment::class, 'BlogID');
	}
}
