<?php
// $s=(a*b)/2
// $s=(a**2 * sqrt(3))/4
// $s=(h*a)/2

function check($d_a, $d_b, $d_c, $a, $b, $c) {
    if (($d_a + $d_b + $d_c) != 180) {
        echo 'It is not a triangle';
        die;
    }
    if ($d_a==90 || $d_b==90 || $d_c==90) {
        $s=($a*$b)/2;
        echo 's= ' . $s . '<br>';
    } else if ($a==$b && $b==$c && $a==$c) {
        $s=($a**2 * sqrt(3))/4;
        echo 's= ' . $s . '<br>';
    } else {
        $p = ($a + $b + $c) / 2;
        $s = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
        echo 's= ' . $s . '<br>';
    }
}

$d_a = 90;
$d_b = 40;
$d_c = 50;
$a = 1;
$b = 4;
$c = 5;

check($d_a, $d_b, $d_c, $a, $b, $c);