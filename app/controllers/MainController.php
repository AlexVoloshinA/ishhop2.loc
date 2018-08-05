<?php
/**
 * Created by PhpStorm.
 * User: avolo
 * Date: 02-Aug-18
 * Time: 23:59
 */

namespace app\controllers;

use ishop\base\Controller;

class MainController extends AppController
{



    public function indexAction(){

        $posts = \R::findAll('test');
        $post = \R::findOne('test', 'id = ?', [2]);
        debug($post);
        
      //  debug($this->route);
       // debug($this->controller);
      //  echo __METHOD__;
      $this->setMeta('Main Page', 'Description', 'Keywords');


      $name = 'Alex';
      $age = 30;
      $names = ['Alex', 'Jane'];

      $this->set(compact('name', 'age', 'names', 'posts'));
    }
}