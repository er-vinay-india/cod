<?php

namespace App\Managers;

use App\Entities\Factory;
use Illuminate\Support\Facades\DB;
use App\Entities\User;

class UserManager {

    public function getUser($guid) {
        
        $user = Factory::build('user', $guid);

        if(!$user) {
            return false;
        } 

        return $user->export();
    }

    public function getUsers($options = []) {

        $indexes = DB::select("SELECT * FROM entities_index WHERE keyword = 'user' LIMIT " . $options['limit'] . " OFFSET " . $options['offset']);

        $users = [];

        foreach($indexes as $index) {
            if($this->getUser($index->guid)) {
                $users[] = $this->getUser($index->guid);
            }
        }

        return $users;
    }

    public function addUser(User $user) {

        // Any Business Logic

        $user->save();
    }

    public function checkEmailExists($email) {
        $result = DB::select("SELECT * FROM entities WHERE keyword = 'email' AND value = ?", [
            $email
        ]);

        if(count($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function checkUsernameExists($username) {
        $result = DB::select("SELECT * FROM entities WHERE keyword = 'username' AND value = ?", [
            $username
        ]);

        if(count($result) == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    public function deleteUser(string $user_guid) {
        $user = new User($user_guid);
        return $user->delete();
    }
}