<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 20.04.18
 * Time: 18:12
 */

if (isset($_POST["num"])){
    if (!empty($_POST["num"])){
        $num = $_POST["num"];
        $sum = 0;
        $str = '';
        for ($i=1; $i <= $num; $i++){
            $pow = pow($i,$i);
            $sum = $sum + $pow;
            $str .= $i . '<sup>'.$i.'</sup>';
            if ($i < $num) {
                $str .= ' + ';
            }
        }
        echo $str . ' = ' . $sum;
    }
}