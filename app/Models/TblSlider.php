<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblSlider extends Model
{
    //
    protected $table = 'tblslider';
	protected $primaryKey = 'SlideId';
    public $timestamps = false; // Disable timestamps
    
    protected $fillable = [
		'SliderName',
        'SliderUrl',
		'Isactive'
	];

	protected $casts = [
        'Isactive' => 'boolean',
    ];
}
