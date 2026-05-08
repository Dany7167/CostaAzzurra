<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class Controller
{
    public function create()
{
    return view('dishes.create');
}


}



