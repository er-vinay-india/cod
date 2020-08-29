<?php

namespace App\Libraries;

use App\Entities\Factory;
use Illuminate\Support\Facades\DB;

class UserLibrary {

    /**
     * @param string $email
     * @return \App\Entities\User|bool
     */
    public static function getUserByEmail($email) {
        
        $db_reponse = DB::table('entities')->where([
            'keyword' => 'email',
            'value' => $email
        ])->first();

        if(!$db_reponse) {
            return false;
        }

        if(empty($db_reponse)) {
            return false;
        }

        $user_guid = $db_reponse->guid;
        return Factory::build('user', $user_guid);
    }

    public static function hash($unhashed_string) {
        return md5($unhashed_string);
    }

    public static function isPasswordMatched($hashed_string, $unhashed_string) {
        $hashed_string_2 = self::hash($unhashed_string);

        if($hashed_string == $hashed_string_2) {
            return true;
        } else {
            return false;
        }
    }
}