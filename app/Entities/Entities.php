<?php

namespace App\Entities;

use Faker\Provider\Uuid;
use Illuminate\Support\Facades\DB;

class Entities
{
    public $guid;
    public $time_created;
    public $time_updated;
    
    protected $entity_type;
    protected $attribute_map = [];
    protected $json_map = [];
    protected $serialize_map = [];

    public function __construct($guid = null)
    {
        if(isset($guid)) {
            $this->guid = $guid;
            $this->load();
        } else {
            $this->guid = time(); // simple way ( Normally We use Guid Server to Generate a GUID )
        }
    } 

    public function getGuid()
    {
        if ($this->guid) {
            return $this->guid;
        }

        $this->guid = time(); // simple way ( Normally We use Guid Server to Generate a GUID )
        return $this->guid;
    }

    public function getEntityType() 
    {
        return $this->entity_type;
    }

    public function setTimeCreated($value){
        $this->time_created=time($value);

    }

    public function getTimeCreated(){
        return $this->time_created;
    }

    public function setTimeUpdated($value){
        $this->time_updated=time($value);

    }

    public function getTimeUpdated(){
        return $this->time_updated;
    }

    public function load($options = []) 
    {
        $response = DB::select('SELECT * FROM entities WHERE guid = ?', [
            $this->guid
        ]); 
        
        if(!$response) {
            return false;
        }
        
        $data_results = [];
        
        foreach($response as $res) {
            $data_results[$res->keyword] = $res->value;
        }

        foreach($this->attribute_map as $key => $value) {
            
            if( !isset($data_results[$key]) ) {
                continue;
            }

            $entity_value = $data_results[$key];
            
            if(in_array($key, $this->serialize_map)) {
                $entity_value = unserialize($entity_value);
            } 

            if(in_array($key, $this->json_map)) {
                $entity_value = json_decode($entity_value);
            }
            
            $function = 'set'.$value;
            $this->$function($entity_value);
        }

        return $this;
    }

    /**
     * SAVE ENTITY INTO ENTITIES TABLE
     * @return bool|int
     */
    public function save()
    {

        if (!isset($this->attribute_map)) {
            return false;
        }

        if (!is_array($this->attribute_map)) {
            return false;
        }

        if (count($this->attribute_map) < 1) {
            return false;
        }

        $this->delete(); // To Prevent Duplicacy In Database         

        $insert_data = [];

        foreach ($this->attribute_map as $key => $value) {

            $function = 'get'.$value;
            $entity_value = $this->$function();
            
            if(in_array($key, $this->serialize_map)) {
                $entity_value = serialize($entity_value);
            } 

            if(in_array($key, $this->json_map)) {
                $entity_value = json_encode($entity_value);
            }

            $insert_data[] = [
                'guid' => $this->guid,
                'keyword' => $key,
                'value' => $entity_value
            ];
        }

        DB::table('entities')->insert($insert_data);

        DB::insert("INSERT INTO entities_index(keyword, guid) VALUES(?, ?)", [
            $this->entity_type,
            $this->guid
        ]);

        return $this->guid;
    }

    /** 
     * DELETE ENTITY FROM ENTITIES TABLE
     * @return bool
     */
    public function delete() 
    {
        if(!isset($this->guid)) {
            return false;
        }

        return DB::delete('DELETE FROM entities WHERE guid = ?', [
            $this->guid
        ]);
    }

    public function export() 
    {
        $product = [
            'guid' => $this->guid,
            'entity_type' => $this->entity_type
        ];

        foreach($this->attribute_map as $attribute_key => $attribute_value) {
            if($this->$attribute_key) 
                $product[$attribute_key] = $this->$attribute_key;
        }

        return $product;
    }
}
