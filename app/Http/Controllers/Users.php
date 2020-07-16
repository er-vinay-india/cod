<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
    public function index() {
        $users = DB::select("select * from user");
        
        echo "<pre>";
        print_r($users);

    }
}
