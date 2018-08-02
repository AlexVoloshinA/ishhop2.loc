<?php
/**
 * Created by PhpStorm.
 * User: avolo
 * Date: 02-Aug-18
 * Time: 21:05
 */

namespace ishop;


trait TSingletone
{
    private static $instance;

    public static  function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}