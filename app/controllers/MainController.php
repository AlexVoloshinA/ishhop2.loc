<?php

namespace app\controllers;

use ishop\base\Controller;
use ishop\Cache;

class MainController extends AppController
{
    
    public function indexAction(){
        $brands = \R::find('brand', 'LIMIT 3');
        $this->set(compact('brands'));

        $this->setMeta('Main Page', 'Description', 'Keywords');

    }
}