<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 09.10.17
 * Time: 17:11
 */

require_once ('engine/curl.php');

$url = 'https://query.yahooapis.com/v1/public/yql?q=';

$ticket = 'GOOG';

$yql = 'select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22' . $ticket . '%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys';

$results = get_web_page($url . $yql);

$data = json_decode($results, true);

//var_dump($data);

$i = 0;

echo 'Count ' . $data['query']['count'] . '<br>';

foreach ($data['query']['results']['quote'] as $key => $value) {
    $i++;
    echo $i . '. ' . $key . ': ' . $value . '<br>';
}

//var_dump($data['query']['results']['quote']);

