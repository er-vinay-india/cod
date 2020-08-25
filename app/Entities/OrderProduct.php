<?php

namespace App\Entities;

use App\Entities\Entities;

class OrderProduct extends Entities{
    protected $prcie;

    public function __construct($guid = null) {

        $this->entity_type = 'orderproduct';

        $this->attribute_map = [
            'price' => 'Price',
        ];

        parent::__construct($guid);
    }

    public function setPrice($value){
        $this->price=$value;
    }
    public function getOrderId(){
        return $this->price;
    }

}
?>