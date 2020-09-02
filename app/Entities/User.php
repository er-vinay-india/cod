<?php

namespace App\Entities;

use App\Entities\Entities;

class User extends Entities {
    
    protected $first_name;
    protected $last_name;
    protected $conatct_no;
    protected $address;
    protected $gender;
    protected $email;
    protected $favourite_item = '';
    protected $no_of_order = 0;
    protected $password;
    protected $is_admin = false;
    
    private $token = null;

    public function __construct($guid = null) {

        $this->entity_type = 'user';

        $this->attribute_map = [
            'name' => 'Name',
            //'contact_no' => 'ContactNo',
            //'address' => 'Address',
            //'gender' => 'Gender',
            'email' => 'Email',
            //'favourite_item' => 'FavouriteItem',
            //'no_of_order' => 'NoOfOrder',
            'password' => 'Password',
            'is_admin' => 'IsAdmin'
        ];

        $this->json_map = [
            'is_admin'
        ];
        $this->serialize_map = [
            'address'
        ];

        parent::__construct($guid);
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setContactNo($value) {
        $this->contact_no = $value;
    }
    public function getContactNo() {
        return $this->contact_no;
    }

    public function setAddress($value) {
        $this->address = $value;
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function setIsAdmin($value) {
        $this->is_admin = $value;
    }

    public function getIsAdmin() {
        return $this->is_admin;
    }

    public function setGender($value) {
        $this->gender = $value;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setEmail($value) {
        $this->email=$value;
    }

    function getEmail() {
        return $this->email;
    }

    public function setFavouriteItem($value) {
        $this->favourite_item = $value;
    }

    public function getFavouriteItem() {
        return $this->favourite_item;
    }

    public function setNoOfOrder($value) {
        $this->no_of_order = $value;
    }

    public function getNoOfOrder() {
        return $this->no_of_order;
    }

    public function setPassword($value) {
        $this->password = $value;
    }

    public function getPassword() {
        return $this->password;
    }

    public function createToken($salt = 'COD PASSPORT GRANT CLIENT') {
        $token = new Token();
        $token->setUserGuid($this->guid);
        $token->setAccessToken(\App\Libraries\PassportLibrary::createHash($this->guid, $salt, time()));
        $token->setCreatedAt(time());
        $token->save();
        $this->token = $token;

        // Add To Session
        session([
            '__user__' => serialize($this)
        ]);
        return $token;
    }

    public function getToken() {
        if(!session('__user__')) {
            return null;
        }

        $serialized_user = session('__user__');
        $user = unserialize($serialized_user);
        
        if(!$user->token) {
            return null;
        }
        
        return $user->token;
    }
}
