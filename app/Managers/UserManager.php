<?php

namespace App\Managers;

use Illuminate\Support\Facades\DB;

use App\Entities\User;

class UserManager {
    public function get($guid) {
        $user = new User($guid);

        if(!$user) {
            return false;
        } 

        return $user->export();
    }

    public function getAll($options = []) {

        $indexes = DB::select("SELECT * FROM entities_index WHERE keyword = 'user' LIMIT " . $options['limit'] . " OFFSET " . $options['offset']);

        $users = [];

        foreach($indexes as $index) {
            if($this->get($index->guid)) {
                $users[] = $this->get($index->guid);
            }
        }

        return $users;
    }

    public function add() {
        
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
}