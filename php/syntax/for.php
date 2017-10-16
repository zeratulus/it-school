<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 21.09.17
 * Time: 18:26
 */

$arr = ['Apple', 'Banana', 'Orange', 'Lemon', 'Mango'];

for ($i = 0; $i < count($arr); $i++) {
    echo $i . ' - ' . $arr[$i] . '<br>';
}

foreach ($arr as $element) {
    echo $element . '<br>';
}

foreach ($arr as $key => $value) {
    echo $key . ' - ' . $value . '<br>';
}

$arr1 = [0 => 'Apple', 2 => 'Banana', 6 => 'Orange', 8 => 'Lemon', 10 => 'Mango'];

$arr2 = [
    0 => [
        'id' => 11231,
        'name' => 'Ilona',
        'tel' => '+11111111'
    ],
    1 => [
        'id' => 22231,
        'name' => 'Tomas',
        'tel' => '+2222222',
    ],
];


echo count($arr1) . '<br>';

for ($i = 0; $i < count($arr1); $i++) {
    echo $i . ' - ' . $arr1[$i] . '<br>';
}

foreach ($arr1 as $key => $value) {
    echo $key . ' ' . $value;
}