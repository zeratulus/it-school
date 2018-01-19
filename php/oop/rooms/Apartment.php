<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 19.01.18
 * Time: 18:09
 */

require_once('class-room.php');

class Apartment extends Room {
    private $height;

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function capacity() {
        return $this->getSquare() * $this->height;
    }

}

$room1 = new Room();
$room1->setNumber(99);
$room1->floor = 8;
var_dump($room1);

echo '<br>';

$app = new Apartment(1, 1, 1000);
$app->setHeight();
var_dump($app);
echo $app->capacity();