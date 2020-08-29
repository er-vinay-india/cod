<?php

namespace App\Libraries;

class PassportLibrary {
    public static function createHash($id, $salt, $time) {
        return md5($id.$salt.$time);
    }
}