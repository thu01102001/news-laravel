<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//sử dụng eloquent
class Categories extends Model
{
    //khai báo table để sử dụng
    protected $table = "categories";
    //nếu trong table categories ko có 2 cột create_at và update_up thì phải khai báo dòng bên dưới
    public $timestamps = false;
}
