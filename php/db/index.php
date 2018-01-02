<?php
ini_set('display_errors', 1);
require_once "config.php";

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DB, DB_PORT);

$results = $db->query('SELECT * FROM users;');

var_dump($results);

echo '<br><br>';

//$fetched = $results->fetch_assoc();

$data = array();

while ($row = $results->fetch_assoc()) {
    $data[] = $row;
}

$db->close();


echo '<style> table, tr td {border: 1px solid #000;}</style>';
echo '<table>';
echo '<thead>';
echo '<tr>';

foreach (end($data) as $key => $value) {
    echo '<td>' . $key . '</td>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($data as $row) {

    echo '<tr>';

    foreach ($row as $key => $value) {
        echo '<td>' . $value . '</td>';
    }

    echo '</tr>';
}
echo '<tbody>';
echo '</table>';


echo '-----------------------------------';


echo '<table>';
echo '<thead>';
echo '<tr>';

foreach (end($data) as $key => $value) {
    echo '<td>' . $key . '</td>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach ($data as $row) {
    if ($row['id'] == 3) {
        break;
    }

    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['password'].'</td>';
    echo '<td>'.$row['email'].'</td>';
    echo '<td>'.$row['login'].'</td>';
    echo '</tr>';
}
echo '<tbody>';
echo '</table>';


for ($i=0; $i < count($data); $i++) {
    var_dump($data[$i]);
    echo '<br><br>';
}

foreach ($data as $row) {
    var_dump($row);
    echo '<br><br>';
}
