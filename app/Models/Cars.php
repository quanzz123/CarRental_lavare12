<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * 
 *
 * @property int $CarID
 * @property string|null $CarName
 * @property int|null $Seat
 * @property string|null $LicensePlate
 * @property string|null $Price
 * @property string|null $Color
 * @property int|null $Model
 * @property float|null $Rate
 * @property string|null $CarBrand
 * @property string|null $Image
 * @property string|null $SalePrice
 * @property string|null $Alias
 * @property bool $IsSale
 * @property bool $IsActive
 * @property string|null $Details
 * @property string|null $Descriptions
 * @property int|null $TypeID
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereCarBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereCarID($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereCarName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereDescriptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereIsSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereLicensePlate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereSeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Cars whereTypeID($value)
 * @mixin \Eloquent
 */
class Cars extends Model
{
    //
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'tbl_Cars';

    // Các trường có thể được gán (fillable)
    protected $fillable = [
        'CarName',
        'Seat',
        'LicensePlate',
        'Price',
        'Color',
        'Model',
        'Rate',
        'CarBrand',
        'Image',
        'SalePrice',
        'Alias',
        'IsSale',
        'IsActive',
        'Details',
        'Descriptions',
        'TypeID',
    ];

    
    protected $guarded = [
        'CarID',  
    ];

    // Để cho phép các trường kiểu boolean như IsSale, IsActive
    protected $casts = [
        'IsSale' => 'boolean',
        'IsActive' => 'boolean',
    ];

    // Quan hệ với bảng CarTypes
    public function carType()
    {
        return $this->belongsTo(CarType::class, 'TypeID');
    }
}
