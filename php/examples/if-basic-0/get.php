<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 16.04.18
 * Time: 18:34
 */
$number = $_GET['number'];
if ($number > 10) {
    echo $number + 100;
} else {
    echo $number - 30;
}