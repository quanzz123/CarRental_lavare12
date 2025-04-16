<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * 
 *
 * @property int $id
 * @property string $Title
 * @property string $Alias
 * @property string $Description
 * @property int $Levels
 * @property int $Position
 * @property int $Isactive
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel whereIsactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel whereLevels($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MenuModel whereTitle($value)
 * @mixin \Eloquent
 */
class MenuModel extends Model
{
    //
    use HasFactory;

    protected $table = 'tbl_menus'; // Chỉ định đúng tên bảng trong DB
}
