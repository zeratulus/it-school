<?php

//$sql = 'SELECT SUM(price) AS total FROM `oc_product`';
//$sql = 'SELECT MIN(price) AS total FROM `oc_product`';
//$sql = 'SELECT MAX(price) AS total FROM `oc_product`';

//$sql = 'SELECT MAX(price) AS maximum, MIN(price) AS minimum, SUM(price) AS total, COUNT(price) AS total_count  FROM `oc_product`';

$sql = 'SELECT p.product_id, pd.name FROM oc_product p LEFT JOIN oc_product_description pd ON (p.product_id = pd.product_id);';

require_once '../db/config.php';

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, 'hohol', DB_PORT);
$db->set_charset('utf8');
$results = $db->query($sql);

$db->close();


echo '<style>

table tr td {
    border: 1px solid #000;
}

table thead td {
    font-weight: bold;
}

</style>';

echo '<table>';

$isFirst = true;
while ($row = $results->fetch_assoc()) {

    if ($isFirst) {
        echo '<thead><tr>';
        foreach ($row as $key => $value) {
            echo '<td>'.$key.'</td>';
        }
        echo '</tr></thead>';
        $isFirst = false;

        echo '<tbody>';
    }

    echo '<tr>';
    foreach ($row as $item) {
        echo '<td>'.$item.'</td>';
    }
    echo '</tr>';
}

echo '</tbody></table>';

//$total = $results->fetch_assoc();

//var_dump($total);

//echo $total['total'];

//SELECT p.product_id, pd.name FROM oc_product p
//LEFT JOIN oc_product_description pd ON (p.product_id = pd.product_id)
//LEFT JOIN oc_product_image pi ON (p.product_id = pi.product_id)
//WHERE p.product_id = 65


// oc_category   oc_category_description
