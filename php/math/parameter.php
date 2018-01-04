<?php
//($x+1)*($x-$a))/($x-4)
function calc($x , $a) {
    if ($x == 4) {
        echo "Game Over=(";
        die;
    } elseif ($a == 4) {
        echo "x = -1";
    } elseif ($a != 4) {
        echo (($x+1)*($x-$a))/($x-4);
    }
}

$a = mt_rand(1,5);
$x = mt_rand(1,5);
echo "x = " . $x ."<br>" ;
echo "a = " . $a ."<br>" ;
calc($x,$a);