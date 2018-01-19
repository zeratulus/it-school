<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 19.01.18
 * Time: 18:35
 */

class Vehicle {
    protected $speed;
    protected $armor;
    protected $hp;
    protected $energy;

    public function __construct($speed, $armor, $hp, $energy)
    {
        $this->speed = $speed;
        $this->armor = $armor;
        $this->hp = $hp;
        $this->energy = $energy;
    }
}

$tank = new Vehicle (100,1000,100,10);
var_dump($tank);