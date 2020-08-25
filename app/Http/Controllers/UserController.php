<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\UserManager;
use App\Entities\User;
use App\Entities\Address;

class UserController extends Controller
{
    public function get(Request $request, ...$arg)
    { // Learn About (...) opertor

        if (!isset($arg[0])) {
            return response()->json([
                'status' => 'success',
                'result' => []
            ]);
        }

        $offset = $request->input('offset') ? $request->input('offset') : 0;
        $limit = $request->input('limit') ? $request->input('limit') : 1;

        /** @var App\Managers\UserManager $manager */

        $manager = new UserManager();
        $address= new Address();

        switch ($arg[0]) {
            case 'all':

                $options = [
                    'limit' => $limit,
                    'offset' => $offset
                ];

                // all products
                $users = $manager->getAll($options);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'users' => $users
                    ],
                ]);
                break;
            case 'single':
                // single user 
                $guid = $arg[1];
                $user = $manager->get($guid);

                return response()->json([
                    'status' => 'success', // notification type
                    'result' => [
                        'user' => $user
                    ],
                ]);
                break;
        }
    }

    public function add(Request $request)
    {

        /** @var \App\Managers\UserManager $manager */
        $manager = new UserManager();


        // validation checking
        if($manager->checkEmailExists($request->post('email'))) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Email already exists!'
                ]
            ]);
        }        

        /** @var \App\Entities\User $user */
        $user = new User();

        if ($request->post('first_name')) {
            $user->setFirstName($request->post('first_name'));
        }

        if ($request->post('last_name')) {
            $user->setLastName($request->post('last_name'));
        }

        if ($request->post('contact_no')) {
            $user->setContactNo($request->post('contact_no'));
        }

        $address = [];
        
        if ($request->post('address')) {

            $address = new Address();
            $address->setAddressLine1($request->post('address_line_1'));
            $address->setAddressLine2($request->post('address_line_2'));
            $address->setlandmark($request->post('landmark'));
            $address->setPincode($request->post('pincode'));
            $address->setCity($request->post('city'));
            $address->setCountry($request->post('country'));
            $address->save();

            $user->setAddress($address);
        }

        if ($request->post('gender')) {
            $user->setGender($request->post('gender'));
        }

        if ($request->post('email')) {
            $user->setEmail($request->post('email'));
        }

        if ($request->post('password')) {
            $user->setPassword($request->post('password'));
        }

        $user->save();

        return response()->json([
            'status' => 'success',
            'result' => [
                'message' => 'User added successfully!'
            ]
        ]);
    }
}
