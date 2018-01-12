<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 12.01.18
 * Time: 18:17
 */

$table = array();
$table[] = array("name" => "Anton", "age" => 13);
$table[] = array("name" => "Sergay", "age" => 29);
$table[] = array("Dima", 17);
var_dump($table);
foreach ($table as $item){
    echo "Меня зовут " . $item["name"] . '. Мне ' . $item["age"] .  " годиков!!!<br>";
}
$db = new mysqli("localhost", "root", "x909c9f0", "finance", "3306");
var_dump($db);
$results = $db->query("SELECT * FROM users");
$db->close();
$data = array();
while ($data[] = $results->fetch_assoc()) {

};
foreach ($data as $item){
    var_dump($item);
    echo "<br>";
}