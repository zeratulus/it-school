<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.03.18
 * Time: 17:52
 */

namespace GameSystem;

class Link {

    public function url($route, $args = array()) {
        $link = 'index.php?route=' . $route;
        foreach ($args as $key => $value) {
            $link .= '&' . $key . '=' . $value;
        }
        return $link;
    }

}