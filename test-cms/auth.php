<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.10.17
 * Time: 17:35
 */

require_once ('config.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    echo 'Error: Enter email please!';
    die();
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else {
    echo 'Error: Enter password please!';
    die();
}

$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DB, '3306');

$results = $db->query('SELECT password, email FROM users WHERE email = "' . $email . '" LIMIT 1;');

//var_dump($results);

$result = $results->fetch_assoc();

if ($email == $result['email']) {
    $hash = md5($password);
//    echo $hash . '<br>';
//    echo $result['password'] . '<br>';
    if ($hash == $result['password']) {
        echo 'Logged in.';
    } else {
        echo 'Password not correct.';
    }
} else {
    echo 'This email not exist.';
}

$db->close();