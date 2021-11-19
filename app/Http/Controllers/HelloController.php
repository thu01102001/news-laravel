<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //ham index la ham duoc goi mac dinh neu action khong duoc truyen len url
    public function index(Request $request){
        echo "Controller: HelloController, action: index";
    }
    //truyen bien vao ham
    public function truyenbien(Request $request, $bien1, $bien2){
        echo "<h1>$bien1 $bien2</h1>";
    }
}
