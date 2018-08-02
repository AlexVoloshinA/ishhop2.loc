<?php
/**
 * Created by PhpStorm.
 * User: avolo
 * Date: 02-Aug-18
 * Time: 21:04
 */

namespace ishop;


class Registry{

    use TSingletone;

    public static $properties = [];

    public  function setProperty($name, $value){
        self::$properties[$name] = $value;
    }

    public function getProperty($name){
        if(isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    public function getProperties(){
        return self::$properties;
    }

}