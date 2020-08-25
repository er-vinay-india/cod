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

    public function __construct($guid = null) {

        $this->entity_type = 'user';

        $this->attribute_map = [
            'first_name' => 'FirstName',
            'last_name' => 'LastName',
            //'contact_no' => 'ContactNo',
            //'address' => 'Address',
            //'gender' => 'Gender',
            'email' => 'Email',
            //'favourite_item' => 'FavouriteItem',
            //'no_of_order' => 'NoOfOrder',
            'password' => 'Password',
        ];

        $this->json_map = [];
        $this->serialize_map = [
            'address'
        ];

        parent::__construct($guid);
    }

    public function setFirstName($value) {
        $this->first_name = $value;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function setLastName($value) {
        $this->last_name = $value;
    }

    public function getLastName() {
        return $this->last_name;
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
        $this->password = md5($value);
    }

    public function getPassword() {
        return $this->password;
    }
}
