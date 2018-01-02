<?php
$some_array = array();

$max = mt_rand(10, 50);

for ($i = 0; $i < $max; $i++) {
    $some_array[] = mt_rand(0, 9999);
}


echo '<h2>Work of foreach ($some_array as $item): </h2><br>';
foreach ($some_array as $item) {
    echo $item . '<br>';
}

echo '<h2>Work of: for ($i = 0; $i < count($some_array); $i++) : </h2><br>';
for ($i = 0; $i < count($some_array); $i++) {
    $item = $some_array[$i];
    echo $item . '<br>';
}


$sum = 0;
foreach ($some_array as $item) {
    $sum = $sum + $item;
}

echo '<br>Total: ' . $sum . '<br>';



echo '<h2>Key => Value example: </h2><br>';
foreach ($some_array as $key => $value) {
    echo $key . ' : ' . $value . '<br>';
}
