<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblNews
 * 
 * @property int $NewsID
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
 * @property bool $IsActive
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|TblNewscommnent[] $tbl_newscommnents
 *
 * @package App\Models
 */
class TblNews extends Model
{
	protected $table = 'tbl_news';
	protected $primaryKey = 'NewsID';

	protected $casts = [
		'CategoryId' => 'int',
		'CreatedDate' => 'datetime',
		'ModifiedDate' => 'datetime',
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
		'IsActive'
	];

	public function tbl_newscommnents()
	{
		return $this->hasMany(TblNewscommnent::class, 'NewsID');
	}
}
