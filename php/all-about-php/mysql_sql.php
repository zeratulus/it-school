<?php

//$sql = 'SELECT SUM(price) AS total FROM `oc_product`';
//$sql = 'SELECT MIN(price) AS total FROM `oc_product`';
//$sql = 'SELECT MAX(price) AS total FROM `oc_product`';

$sql = 'SELECT MAX(price) AS maximum, MIN(price) AS minimum, SUM(price) AS total, COUNT(price) AS total_count  FROM `oc_product`';

require_once '../db/config.php';

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, 'hohol', DB_PORT);

$results = $db->query($sql);

$db->close();

$total = $results->fetch_assoc();

var_dump($total);

echo $total['total'];

//SELECT p.product_id, pd.name FROM oc_product p
//LEFT JOIN oc_product_description pd ON (p.product_id = pd.product_id)
//LEFT JOIN oc_product_image pi ON (p.product_id = pi.product_id)
//WHERE p.product_id = 65


// oc_category   oc_category_description