<?php

namespace App\Entities;
namespace App\Product;

use App\Entities\Entities;

class Order extends Entities {
    protected $promo_applied;
    protected $order_id;
    protected $order_product = [];
    protected $total_price;
    protected $status;

    public function __construct($guid = null) {

        $this->entity_type = 'order';

        $this->attribute_map = [
            'promo_applied' => 'PromoApplied',
            'order_id' => 'OrderId',
            'order_product' => 'OrderProduct',
            'total_price' => 'TotalPrice',
            'status' => 'Status'
        ];

        parent::__construct($guid);
    }

    public function setPromoApplied($value){
        $this->promo_applied=$value;
    }
    
    public function getPromoApplied() {
        return $this->promo_applied;
    }

    public function setOrderId($value) {
        $this->order_id = $value;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function setTotalPrice($value) {
        foreach($price as $total_price) {
            $total_price += $price;
        }
        $this->total_price = $value;
    }

    public function setOrderProduct($value){
        $this->order_product=$value;
    }

    public function getOrderProduct() {
        return $this->order_product;
    }

    public function setStatus($value) {
        $this->status = $value;
    }

    public function getStatus() {
        return $this->status;
    }
}

