<?php

$sql = 'SELECT * FROM `users`';

require_once '../db/config.php';

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB, DB_PORT);

$results = $db->query($sql);


var_dump($db);
echo '<br><br>';
var_dump($results);
echo '<br><br>';

$db->close();

$data = array();

while ($row = $results->fetch_assoc()) {
    $data[] = $row;
}

var_dump($data);
echo '<br>';
foreach ($data as $user) {
    echo $user['id'] . ': ' . $user['login'] . ' - ' . $user['email'] . '<br>';
}