<?php

namespace App\Managers;

use Illuminate\Support\Facades\DB;

use App\Entities\Order;

class OrderManager {
    public function get($guid) {
        $order = new Order($guid);

        if(!$order) {
            return false;
        } 

        return $order->export();
    }

    public function getAll($options = []) {

        $indexes = DB::select("SELECT * FROM entities_index WHERE keyword = 'order' LIMIT " . $options['limit'] . " OFFSET " . $options['offset']);

        $orders = [];

        foreach($indexes as $index) {
            if($this->get($index->guid)) {
                $orders[] = $this->get($index->guid);
            }
        }

        return $orders;
    }

    public function add() {

    }
}