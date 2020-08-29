<?php

namespace App\Entities\Interfaces;

Interface FactoryDesignPattern {
    public static function build($entity_type);
}