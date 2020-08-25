<?php

namespace App\Managers;

use Illuminate\Support\Facades\DB;

use App\Entities\Address;

class AddressManager {
    public function get($guid) {
        $address = new Address($guid);

        if(!$address) {
            return false;
        } 

        return $address->export();
    }

    public function getAll($options = []) {

        $indexes = DB::select("SELECT * FROM entities_index WHERE keyword = 'address' LIMIT " . $options['limit'] . " OFFSET " . $options['offset']);

        $addresses = [];

        foreach($indexes as $index) {
            if($this->get($index->guid)) {
                $addresses[] = $this->get($index->guid);
            }
        }

        return $addresses;
    }

    public function add() {

    }
}