<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\AddressManager;
use App\Entities\Address;

class AddressController extends Controller
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

        /** @var App\Managers\AddressManager $manager */
        $manager = new AddressManager();

        switch($arg[0]) {
            case 'all':

                $options = [
                    'limit' => $limit,
                    'offset' => $offset
                ];

                // all products
                $addresses = $manager->getAll($options);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'addresses' => $addresses
                    ],
                ]);
                break;
            case 'single':
                // single product 
                $guid = $arg[1];
                $address = $manager->get($guid);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'address' => $address
                    ],
                ]);
                break;
        }


    }

    public function add(Request $request)
    {
       /** @var \App\Entities\Address */
       $address= new Address();

        if($request->post('address_line1')) {
            $address->setAddressLine1($request->post('address_line1'));
        }

        if($request->post('address_line2')) {
            $address->setAddressLine2($request->post('address_line2'));
        }
        
        if($request->post('landmark')) {
            $address->setLandmark($request->post('landmark'));
        }
        
        if($request->post('pincode')) {
            $address->setPincode($request->post('pincode'));
        }

        if($request->post('city')) {
            $address->setCity($request->post('city'));
        }

        if($request->post('country')) {
            $address->setCountry($request->post('country'));
        }
        $address->save();

        return response()->json([
            'status' => 'success',
            'result' => [
                'message' => 'User added successfully!'
            ]
        ]);
    }
}
