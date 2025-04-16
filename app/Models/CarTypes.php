<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * 
 *
 * @property int $TypeID
 * @property string $CarTypeName
 * @property int $Seats
 * @property string|null $Manufacturer
 * @property string|null $Image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes whereCarTypeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes whereManufacturer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes whereSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes whereTypeID($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CarTypes whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
