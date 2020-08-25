<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\OrderProductManager;
use App\Entities\OrderProduct;

class OrderProductController extends Controller
{
    public function get(Request $request, ...$arg) { // Learn About (...) opertor

        if(!isset($arg[0])) {
            return response()->json([
                'status' => 'success',
                'result' => []
            ]); 
        }

        $offset = $request->input('offset') ? $request->input('offset') : 0;
        $limit = $request->input('limit') ? $request->input('limit') : 1;

        /** @var App\Managers\OrderProductManager $manager */
        $manager = new OrderProductManager();

        switch($arg[0]) {
            case 'all':

                $options = [
                    'limit' => $limit,
                    'offset' => $offset
                ];

                // all products
                $orderproducts = $manager->getAll($options);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'orderproducts' => $orderproducts
                    ],
                ]);
                break;
            case 'single':
                // single product 
                $guid = $arg[1];
                $orderproduct = $manager->get($guid);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'orderproduct' => $orderproduct
                    ],
                ]);
                break;
        }


    }
    public function add(Request $request)
    {
       /** @var \App\Entities\OrderProduct */
       $orderproduct= new OrderProduct();

       if($request->post('prcie')) {
        $orderproduct->setPrice($request->post('price'));
    }

        $orderproduct->save();

        return response()->json([
            'status' => 'success',
            'result' => [
                'message' => 'User added successfully!'
            ]
        ]);
    }
}
