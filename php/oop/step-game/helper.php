<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:37
 */

function showUnitParams ($unit)
{
    echo 'ID: ' . $unit->id . '<br>';
    echo 'Name: ' . $unit->name . '<br>';
    echo 'Health Points: ' . $unit->hp . '<br>'; //Healt Points
    echo 'Armor Points: ' . $unit->ap . '<br>'; //Armor Points
    echo 'Mana Points: ' . $unit->mp . '<br>'; //Mana Points
    echo 'Armor Type: ' . $unit->armor_type . '<br>';
    echo 'Speed: ' . $unit->speed . '<br><br>';
}

function salt($length = 32) {
    $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    $salt = '';
    for ($i = 0; $i < $length; $i++) {

        if (mt_rand(0, 1)) {
            $salt .= strtoupper($alphabet[mt_rand(0, count($alphabet))]);
        } else {
            $salt .= $alphabet[mt_rand(0, count($alphabet))];
        }

    }
    return $salt;
}