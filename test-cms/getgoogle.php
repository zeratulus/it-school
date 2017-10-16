<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 06.10.17
 * Time: 18:26
 */

require_once ('engine/curl.php');

//$result = get_web_page('https://google.com.ua', 'CP-1251');

$url = 'https://blockchain.info/ru/ticker';

$result = get_web_page($url);

//var_dump($result);

//echo $result['content'];

$arr = json_decode($result['content'], true);

var_dump($arr);

echo '<br><br>';

echo $arr['USD']['15m'] . $arr['USD']['symbol'];

//var_dump($arr['USD']);

//foreach ($arr as $item) {
////    var_dump($item);
////    echo $item['15m'];
//    foreach ($item as $data) {
//        echo $data . '<br><br>';
//    }
//    echo '<br><br>';
//}