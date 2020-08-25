<?php

namespace App\Entities;

use App\Entities\Entities;

class Product extends Entities {
    protected $price;
    protected $title;
    protected $quantity;
    protected $images = [];

    public function __construct($guid = null) {
        
        $this->entity_type = 'product';
        
        $this->attribute_map = [
            'price' => 'Price',
            'title' => 'Title',
            'quantity' => 'Quantity',
        ];

        $this->json_array=[
            'images' =>'Images'
        ];

        parent::__construct($guid);
    }

    public function setPrice($value) {
        $this->price = $value;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setTitle($value) {
        $this->title = ucfirst($value);
    }

    public function getTitle() {
        return $this->title;
    }

    public function setQuantity($value) {
        $this->quantity = $value;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getImages($value) {
        return $this->images;
    }

}
