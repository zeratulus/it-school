<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 17:46
 */

namespace GameObjects;

class Unit
{
    public $image;

    public $hp; //Healt Points
    public $mp; //Mana Points
    public $ap; //Armor Points
    public $armor_type;
    public $speed; // Unit Base Speed

    public $name;

    public function __construct($hp, $mp, $ap, $armor_type, $speed, $image, $name)
    {
        $this->image = $image;

        $this->hp = $hp;
        $this->mp = $mp;
        $this->ap = $ap;
        $this->armor_type = $armor_type;
        $this->speed = $speed;
        $this->name = $name;
    }

    public function getDamage($damage, $damage_type) {
        if ($this->armor_type == 2) { //Medium Armor
            $hp_damage = $damage * $damage_type * 0.75;
        } elseif ($this->armor_type == 3) { //Heavy Armor
            $hp_damage = $damage * $damage_type * 0.5;
        } else { //Standart Armor
            $hp_damage = $damage * $damage_type;
        }

        if ($this->ap > 0) {
            $hp_damage = $hp_damage / 2;
            $ap_damage = $hp_damage;
        } else {
            $ap_damage = 0;
        }

        $this->ap = $this->ap - $ap_damage;
        $this->hp = $this->hp - $hp_damage;
    }

}