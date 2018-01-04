<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 18.12.17
 * Time: 18:26
 */

function ax2bxc($a, $b, $c) {
    // a*x*x + b*x + c = 0
    //$a * $x * $x + $b * $x + $c = 0;
    $results = array();
    $d = $b ** 2 - 4 * $a * $c;
//    echo $d . '<br>';
//    echo sqrt($d). '<br>';
    if ($d > 0) {
        // 2 results
//        echo (- $b - sqrt($d));
//        echo (2 * $a);
        $x1 = (- $b - sqrt($d)) / (2 * $a);
        $x2 = (- $b + sqrt($d)) / (2 * $a);
        $results['x1'] = $x1;
        $results['x2'] = $x2;
        return $results;
    } elseif ($d = 0) {
        // 1 result
        return $results['x'] = -$b / (2 * $a);
    } else {
        return false;
    }

}

echo '<br><br>';
//$x = 12;
$a = 5;
$b = -9;
$c = -2;

$res = ax2bxc($a, $b, $c);

var_dump($res);
echo '<br><br>';