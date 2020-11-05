<?php


namespace App\Factory\Traits;


use App\Factory\Factory;

trait UseFactory
{
    public static function factory():Factory {
        return Factory::factoryForObject(get_called_class());
    }
}
