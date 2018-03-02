<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.03.18
 * Time: 18:03
 */

namespace GameSystem;

class Controller {
    public $link;

    public function __construct() {
        $this->link = new Link();
    }

}