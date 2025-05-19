<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblSlider extends Model
{
    //
    protected $table = 'tblslider';
	protected $primaryKey = 'SlideId';

	protected $fillable = [
		'SliderName',
        'Sliderdecs'
	];
}
