<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 16.04.18
 * Time: 18:44
 */
$numbers = array();
for ($i = 0;$i < 10;$i++) {
    $numbers[]=mt_rand(0,1000);
}
var_dump($numbers);
echo '<br>Максимальное число = '.max($numbers).'<br>';
echo 'Минимальное число = '.min($numbers).'<br>';