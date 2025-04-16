<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CarTypes extends Model
{
    //
    use HasFactory;

    
    protected $table = 'tbl_CarTypes';

    
    protected $fillable = [
        'CarTypeName',
        'Seats',
        'Manufacturer',
        'Image',
    ];

    
    protected $guarded = [
        'TypeID',  
    ];

    
    public function cars()
    {
        return $this->hasMany(Car::class, 'TypeID');
    }
}
