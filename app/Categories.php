<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//su dung eloquent
class Categories extends Model
{
    //khai bao table de su dung
    protected $table = "categories";
    //neu trong table categories khong co 2 cot create_at va update_at thi phai khai bao dong ben duoi
    public $timestamps = false;
}
