<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SumController extends Controller
{
    public function index() {
        echo"<pre>";
        $x=2;
        $y=4;
        $z=$x+$y;
        print_r($z); die();
        
    }
}
