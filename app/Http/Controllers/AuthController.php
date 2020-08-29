<?php

namespace App\Http\Controllers;

use App\Entities\Factory;
use App\Managers\UserManager;
use Illuminate\Http\Request;
use App\Libraries\UserLibrary;

class AuthController extends Controller
{
    public function registration(Request $request) {

        // validations

        $email = $request->post('email');
        $user = UserLibrary::getUserByEmail($email);
        
        if($user) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'User Already Exists!'
                ]
            ]); 
        }

        /** \App\Entities\User $user */
        $user = Factory::build('user');

        if ($request->post('first_name')) {
            $user->setFirstName($request->post('first_name'));
        }

        if ($request->post('last_name')) {
            $user->setLastName($request->post('last_name'));
        }

        if ($request->post('email')) {
            $user->setEmail($request->post('email'));
        }

        if ($request->post('password')) {
            $user->setPassword(UserLibrary::hash($request->post('password')));
        }

        /** @var \App\Managers\UserManager $manager */
        $manager = new UserManager();
        $manager->addUser($user);

        // Generate Session
        session([
            '__user__' => serialize($user)
        ]);

        // Authorization
        $token = $user->createToken();

        return response()->json([
            'status' => 'Success',
            'result' => [
                'user' => $user->export(),
                'user_guid' => $user->getGuid(),
                'access_token' => $token->getAccessToken()
            ]
        ]);
    }

    public function login(Request $request) {
        $email = $request->post('email');
        $password = $request->post('password');
        $user = UserLibrary::getUserByEmail($email);

        if(!$user) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Authentication Failed'
                ]
            ]); 
        }

        // Authenticate User
        if(!UserLibrary::isPasswordMatched($user->getPassword(), $password)) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Authentication Failed'
                ]
            ]);
        }

        // Generate Session
        session([
            '__user__' => serialize($user)
        ]);

        // Authorization
        $token = $user->createToken();

        return response()->json([
            'status' => 'Success',
            'result' => [
                'user' => $user->export(),
                'user_guid' => $user->getGuid(),
                'access_token' => $token->getAccessToken()
            ]
        ]);
    }

    public function logout(Request $request) {

        if ($request->session()->has('__user__')) {

            // Revoke Access Token
            $serialized_user = $request->session()->get('__user__');
            /** @var \App\Entities\User $user */
            $user = unserialize($serialized_user);
            $token = $user->getToken();
            $token->delete();

            // Session Stop
            $request->session()->forget('__user__');
        }

        return response()->json([
            'status' => 'Success',
            'result' => [
                'message' => 'Logout Successfully!'
            ]
        ]);
    }
}
