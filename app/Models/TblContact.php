<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TblContact
 * 
 * @property int $ContactID
 * @property string|null $Name
 * @property string|null $Phone
 * @property string|null $Email
 * @property string|null $Message
 * @property int|null $IsRead
 * @property Carbon|null $CreatedDate
 * @property string|null $CreatedBy
 * @property Carbon|null $ModifiedDate
 * @property string|null $ModifiedBy
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TblContact extends Model
{
	protected $table = 'tbl_contact';
	protected $primaryKey = 'ContactID';

	protected $casts = [
		'IsRead' => 'int',
		'CreatedDate' => 'datetime',
		'ModifiedDate' => 'datetime'
	];

	protected $fillable = [
		'Name',
		'Phone',
		'Email',
		'Message',
		'IsRead',
		'CreatedDate',
		'CreatedBy',
		'ModifiedDate',
		'ModifiedBy'
	];
}
