<?php

namespace App\Managers;

use Illuminate\Support\Facades\DB;

use App\Entities\ProductFeature;

class ProductFeatureManager {
    public function get($guid) {
        $productfeature = new ProductFeature($guid);

        if(!$productfeature) {
            return false;
        } 

        return $productfeature->export();
    }

    public function getAll($options = []) {

        $indexes = DB::select("SELECT * FROM entities_index WHERE keyword = 'productfeature' LIMIT " . $options['limit'] . " OFFSET " . $options['offset']);

        $productsfeature = [];

        foreach($indexes as $index) {
            if($this->get($index->guid)) {
                $productsfeature[] = $this->get($index->guid);
            }
        }

        return $productsfeature;
    }

    public function add() {

    }
}