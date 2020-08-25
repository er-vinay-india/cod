<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\ProductFeatureManager;
use App\Entities\ProductFeature;

class ProductFeatureController extends Controller
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

        /** @var App\Managers\ProductFeatureManager $manager */
        $manager = new ProductFeatureManager();

        switch($arg[0]) {
            case 'all':

                $options = [
                    'limit' => $limit,
                    'offset' => $offset
                ];

                // all productfeatures
                $productfeatures = $manager->getAll($options);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'productfeatures' => $productfeatures
                    ],
                ]);
                break;
            case 'single':
                // single productfeature
                $guid = $arg[1];
                $productfeature = $manager->get($guid);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'productfeature' => $productfeature
                    ],
                ]);
                break;
        }


    }

    public function add(Request $request)
    {
       /** @var \App\Entities\ProductFeature */
       $productfeature= new ProductFeature();

       if($request->post('title')) {
        $productfeature->setTitle($request->post('title'));
    }

    if($request->post('description')) {
        $productfeature->setDescription($request->post('description'));
    }

        $productfeature->save();
    }
}
