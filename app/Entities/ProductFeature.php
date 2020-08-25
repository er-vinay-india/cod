<?php

namespace App\Entities;

use App\Entities\Entities;

class ProductFeature extends Entities
{
    protected $title;
    protected $description;

    public function __construct($guid = null) {

        $this->entity_type = 'productfeature';

        $this->attribute_map = [
            'title' => 'Title',
            'description' => 'Description',
        ];

        parent::__construct($guid);
    }

    public function setTitle($value){
        $this->title=$value;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setDescription($value){
        $this->description=$value;
    }
    public function getDescription(){
        return $this->description;
    }
}