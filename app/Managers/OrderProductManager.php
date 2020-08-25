<?php

namespace App\Managers;

use Illuminate\Support\Facades\DB;

use App\Entities\OrderProduct;

class OrderProductManager {
    public function get($guid) {
        $orderproduct = new Product($guid);

        if(!$orderproduct) {
            return false;
        } 

        return $orderproduct->export();
    }

    public function getAll($options = []) {

        $indexes = DB::select("SELECT * FROM entities_index WHERE keyword = 'orderproduct' LIMIT " . $options['limit'] . " OFFSET " . $options['offset']);

        $orderproducts = [];

        foreach($indexes as $index) {
            if($this->get($index->guid)) {
                $orderproducts[] = $this->get($index->guid);
            }
        }

        return $orderproducts;
    }

    public function add() {

    }
}