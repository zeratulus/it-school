<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 28.09.17
 * Time: 18:19
 */
ini_set('display_errors', 1);

require_once('config.php');
require_once('engine/library/mysqli.php');

$db = new DBMySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DB);

foreach ($_POST as $key => $value) {
    echo $key . ' : ' . $value . '<br>';
}

$login = trim($_POST['login']);
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];

if (isset($_POST['agreement'])) {
    $agreement = $_POST['agreement'];
} else {
    $agreement = 0;
}

if (strlen($login) < 1) {
    echo 'Error to short login name<br>';
    die();
}

if (strlen($email) < 5) {
    echo 'Error not valid email<br>';
    die();
}

if ($pass != $pass_confirm) {
    echo 'Pass & Pass Confirm not equal<br>';
    die();
}

if (!$agreement) {
    echo 'Error: You should check User Agreement<br>';
    die();
}

$db = new DBMySQLi(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DB);

$result = $db->query('INSERT INTO `users`(`password`, `email`, `login`) VALUES (MD5("'.$pass.'"), "'.$db->escape($email).'", "'.$db->escape($login).'");');

if ($result) echo 'All Fine!';

//$results = $db->query('SELECT * FROM users');
//
//foreach ($results->rows as $result) {
//    echo 'User ID:' . $result['id'] . ' - User Name: ' . $result['login'] . '<br>';
//}
//
//$db = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DB, '3306');
//$db->set_charset("utf8");
//
//$results = $db->query('SELECT * FROM users');
//
//while ($result = $results->fetch_assoc()) {
//    echo 'User ID:' . $result['id'] . ' - User Name: ' . $result['login'] . '<br>';
//}
//
//$db->close();