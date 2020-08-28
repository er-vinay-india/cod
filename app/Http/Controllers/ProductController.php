<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\ProductManager;
use App\Entities\Product;

class ProductController extends Controller
{
    public function get(Request $request, ...$arg) { // Learn About (...) opertor

        if(!isset($arg[0])) {
            return response()->json([
                'status' => 'success',
                'result' => []
            ]); 
        }

        $offset = $request->input('offset') ? $request->input('offset') : 0;
        $limit = $request->input('limit') ? $request->input('limit') : 10;

        /** @var App\Managers\ProductManager $manager */
        $manager = new ProductManager();

        switch($arg[0]) {
            case 'all':

                $options = [
                    'limit' => $limit,
                    'offset' => $offset
                ];

                // all products
                $products = $manager->getAll($options);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'products' => $products
                    ],
                ]);
                break;
            case 'single':
                // single product 
                $guid = $arg[1];
                $product = $manager->get($guid);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'product' => $product
                    ],
                ]);
                break;
        }


    }

    public function add(Request $request) {

        /** @var \App\Entities\Product */
        $product = new Product();
        
        if($request->post('title')) {
            $product->setTitle($request->post('title'));
        }
        
        if($request->post('price')) {
            $product->setPrice($request->post('price'));
        }

        if($request->post('quantity')) {
            $product->setQuantity($request->post('quantity'));
        }

        //encoding and decoding images
        
        $images=array();
        foreach($images as $image) {
            json_encode($images);
        }
        $jsonobj = '{}';
            $images = json_decode($jsonobj, true);

        $product->save();

        return response()->json([
            'status' => 'success',
            'result' => [
                'message' => 'Product added successfully!'
            ]
        ]);
    }
}
