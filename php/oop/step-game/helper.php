<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:37
 */

function showUnitParams ($unit) {
    echo 'ID: ' . $unit->id . '<br>';
    echo 'Name: ' . $unit->name . '<br>';
    echo 'Health Points: ' . $unit->hp . '<br>'; //Healt Points
    echo 'Armor Points: ' . $unit->ap . '<br>'; //Armor Points
    echo 'Mana Points: ' . $unit->mp . '<br>'; //Mana Points
    echo 'Armor Type: ' . $unit->armor_type . '<br>';
    echo 'Speed: ' . $unit->speed . '<br><br>';
}