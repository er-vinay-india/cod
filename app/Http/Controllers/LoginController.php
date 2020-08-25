<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        echo "<pre>";
        print_r($_POST); die();
    }
}
