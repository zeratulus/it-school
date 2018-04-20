<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 16.04.18
 * Time: 17:44
 */

ini_set('display_errors', 1);

echo '<br><br><a href="index.html">Ввести числа</a><br><br>';

if (isset($_GET['number'])) {
    $number = $_GET['number'];

    $sum = 0;

    for ($i = 0; strlen($number) > $i; $i++) {
        $sum = $sum + $number[$i];
    }

    echo 'Сумма цифр числа ' . $number . ' = ' . $sum;

}