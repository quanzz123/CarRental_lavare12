<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MenuModel extends Model
{
    //
    use HasFactory;

    protected $table = 'tbl_menus'; // Chỉ định đúng tên bảng trong DB
}
