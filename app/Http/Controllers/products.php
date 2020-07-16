<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class products extends Controller
    {
        public function index() {
            $products = DB::select("select * from product");
            return view('product', [
                'products' => $products
            ]);
        }
    }
    
