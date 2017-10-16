<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 06.10.17
 * Time: 17:16
 */
function get_web_page($url, $encoding = 'UTF-8') {
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => $encoding,       // handle all encodings
        CURLOPT_USERAGENT      => "PHP cURL", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    );

    $ch = curl_init( $url );
    curl_setopt_array($ch, $options );
    $content = curl_exec($ch);
    $err = curl_errno($ch );
    $errmsg = curl_error($ch);
    $header = curl_getinfo($ch);
    curl_close( $ch );

    $header['errno'] = $err;
    $header['errmsg'] = $errmsg;
//    $header['content'] = iconv('windows-1251', 'UTF-8', $content);
    $header['content'] = $content;
    return $header['content'];
}