<?php

namespace App\Entities;

use App\Entities\Entities;

class Token extends Entities {
    protected $user_guid;
    protected $token;
    protected $created_at;

    public function __construct($guid = null) {
        
        $this->entity_type = 'token';
        $this->table = 'token';
        
        $this->attribute_map = [
            'user_guid' => 'UserGuid',
            'access_token' => 'AccessToken',
            'created_at' => 'CreatedAt',
        ];

        parent::__construct($guid);
    }
    
    public function setUserGuid($value) {
        $this->user_guid = $value;
    }

    public function getUserGuid()
    {
        return $this->user_guid;
    }

    public function setAccessToken($value){
        $this->access_token = $value;
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function setCreatedAt($value){
        $this->created_at = $value;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public static function check($token) {
        $response = DB::select("SELECT * FROM token WHERE keyword = 'access_token' AND value = ?", [
            $token
        ]);

        $token_guid = '';
        $token = new Token($token_guid);
        return $token;
    }
}
