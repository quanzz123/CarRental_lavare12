<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
