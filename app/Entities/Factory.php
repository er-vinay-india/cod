<?php
namespace App\Entities;
use App\Entities\Interfaces\FactoryDesignPattern;

class Factory implements FactoryDesignPattern {
    
    public static function build($entity_type, $guid = null) {
        $entity_type = self::enhance($entity_type);

        if(class_exists('\\App\Entities\\' . $entity_type)) {
            $classname = '\\App\\Entities\\' . $entity_type;
            return new $classname($guid);
        }
    }

    private static function enhance($entity_type) {
        return ucfirst($entity_type);
    }
}