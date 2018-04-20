<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 16.04.18
 * Time: 17:44
 */

ini_set('display_errors', 1);

if (isset($_POST['numbers'])) {
    $numbers = explode(',', $_POST['numbers']);

    if (count($numbers) < 2) {
        echo 'Нужно минимум три числа!';
        echo '<br><br><a href="index.html">Ввести числа</a>';
        die();
    }

    $sum = 0;

    foreach ($numbers as $number) {
        $num = trim($number);
        $sum = $sum + (int)$num;
    }

    echo 'Сумма чисел ' . $_POST['numbers'] . ' = ' . $sum;
}

echo '<br><br><a href="index.html">Ввести числа</a>';