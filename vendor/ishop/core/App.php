<?php
/**
 * Created by PhpStorm.
 * User: avolo
 * Date: 02-Aug-18
 * Time: 19:45
 */

namespace ishop;


class App
{

    public static $app;

    public function __construct()
    {
        session_start();
        $query = trim($_SERVER['QUERY_STRING'], '/');

        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();

    }

        protected function getParams(){
            $params = require_once CONF . '/params.php';
            if(!empty($params)){
                foreach ($params as $k => $v){
                    self::$app->setProperty($k,$v);
                }
            }
        }

}