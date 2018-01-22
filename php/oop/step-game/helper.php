<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:37
 */

function showUnitParams ($unit) {
    echo 'Name: ' . $unit->name . '<br>';
    echo 'HP: ' . $unit->hp . '<br>'; //Healt Points
    echo 'MP: ' . $unit->mp . '<br>'; //Mana Points
    echo 'AP: ' . $unit->ap . '<br>'; //Armor Points
    echo 'AT: ' . $unit->armor_type . '<br>';
    echo 'SP: ' . $unit->speed . '<br>';
}