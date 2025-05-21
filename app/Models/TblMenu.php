<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TblMenu
 * 
 * @property int $id
 * @property string $Title
 * @property string $Alias
 * @property string $Description
 * @property int $Levels
 * @property int $Position
 * @property bool $Isactive
 *
 * @package App\Models
 */
class TblMenu extends Model
{
	protected $table = 'tbl_menus';
	public $timestamps = false;

	protected $casts = [
		'Levels' => 'int',
		'Position' => 'int',
		'Isactive' => 'bool'
	];

	protected $fillable = [
		'Title',
		'Alias',
		'Description',
		'Levels',
		'Position',
		'Isactive'
	];
}
