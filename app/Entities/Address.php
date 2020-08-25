<?php

namespace App\Entities;

use App\Entities\Entities;

class Address extends Entities
{
    protected $address_line1;
    protected $address_line2;
    protected $landmark;
    protected $pincode;
    protected $city;
    protected $country;

    public function __construct($guid = null) {

        $this->entity_type = 'address';

        $this->attribute_map = [
            'address_line1' => 'AddressLine1',
            'address_line2' => 'AddressLine2',
            'landmark' => 'Landmark',
            'pincode' => 'Pincode',
            'city' => 'City',
            'country' => 'Country' 
        ];
        
        parent::__construct($guid);
    }

    public function setAddressLine1($value){
        $this->address_line1=$value;
    }
    public function getAddressLine1(){
        return $this->address_line1;
    }

    public function setAddressLine2($value){
        $this->address_line2=$value;
    }

    public function getAddressLine2(){
        return $this->address_Line2;
    }

    public function setlandmark($value){
        $this->landmark=$value;
    }
    public function getLandmark(){
        return $this->landmark;
    }

    public function setPincode($value){
        $this->pincode=$value;
    }

    public function getPincode($pincode){
        return $this->pincode;
    }
    
    public function setCity($value){
        $this->city=$value;
    }

    public function getCity(){
        return $this->city;
    }

    public function setCountry($value){
        $this->country=$value;
    }
    public function getCountry(){
        return $this->country;
    }
}
?>