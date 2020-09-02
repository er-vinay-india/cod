<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Managers\UserManager;
use App\Entities\User;
use App\Entities\Address;
use App\Entities\Factory;

class UserController extends Controller
{
    public function get(Request $request, ...$arg)
    { // Learn About (...) opertor

        if (!isset($arg[0])) {
            return response()->json([
                'status' => 'success',
                'result' => [

                ]
            ]);
        }

        $offset = $request->input('offset') ? $request->input('offset') : 0;
        $limit = $request->input('limit') ? $request->input('limit') : 10;

        /** @var \App\Managers\UserManager $manager */
        $manager = new UserManager();

        switch ($arg[0]) {
            case 'all':

                $options = [
                    'limit' => $limit,
                    'offset' => $offset
                ];

                // all products
                $users = $manager->getUsers($options);

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
                $user = $manager->getUser($guid);

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
        if ($manager->checkEmailExists($request->post('email'))) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Email already exists!'
                ]
            ]);
        }

        /** @var \App\Entities\User $user */
        $user = Factory::build('user');

        if ($request->post('name')) {
            $user->setName($request->post('name'));
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
            $user->setPassword(\App\Libraries\UserLibrary::hash($request->post('password')));
        }

        $manager->addUser($user);

        return response()->json([
            'status' => 'success',
            'result' => [
                'message' => 'User added successfully!'
            ]
        ]);
    }

    public function delete(Request $request, $user_guid = null)
    {
        $manager = new UserManager();

        if ($request->getMethod() == 'post') {
            $user_guids = $request->post('user_guids');

            foreach ($user_guids as $user_guid) {
                $manager->deleteUser($user_guid);
            }

            $delete = true;
        } else {
            $delete = $manager->deleteUser($user_guid);
        }

        if ($delete) {
            return response()->json([
                'status' => 'success',
                'result' => [
                    'message' => 'User deleted successfully!'
                ]
            ]);
        }

        return response()->json([
            'status' => 'error',
            'result' => [
                'message' => 'Deletition Failed!'
            ]
        ]);
    }
}
