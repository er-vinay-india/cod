<?php

namespace App\Managers;

use Illuminate\Support\Facades\DB;

use App\Entities\Product;

class ProductManager {
    public function get($guid) {
        $product = new Product($guid);

        if(!$product) {
            return false;
        } 

        return $product->export();
    }

    public function getAll($options = []) {

        $indexes = DB::select("SELECT * FROM entities_index WHERE keyword = 'product' LIMIT " . $options['limit'] . " OFFSET " . $options['offset']);

        $products = [];

        foreach($indexes as $index) {
            if($this->get($index->guid)) {
                $products[] = $this->get($index->guid);
            }
        }

        return $products;
    }

    public function add() {

    }

    public function deleteProduct(string $product_guid) {
        $product = new Product($product_guid);
        return $product->delete();
    }
}