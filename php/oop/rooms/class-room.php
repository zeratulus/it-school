<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 19.01.18
 * Time: 17:37
 */
//ini_set('display_errors', 1);

class Room {
    private $number;
    private $square;
    public $floor;

    public function __construct($number = '', $floor = '', $square = '') {
        $this->number = $number;
        $this->floor = $floor;
        $this->square = $square;
    }

    public function setNumber($num) {
        $this->number = $num;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getSquare() {
        return $this->square;
    }
}

//$room1 = new Room();
//$room1->setNumber(99);
//$room1->floor = 8;
//echo $room1->getNumber() . '<br>';
//var_dump($room1);
//
//echo '<br>';
//
//$room2 = new Room(90, 1, 500);
//var_dump($room2);