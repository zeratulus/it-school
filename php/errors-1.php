<?php
//ini_set(display_errors;
//-1);
//foreach ($_['GET']) as $key => value) {
//    echo $key . ':' $value:<br >;
//}
//$login = $_GET['login'];
//    if (isset($_GET['agreement'])) {
//        $agreement = $_GET['agreement'];
//    } else {
//        $agreement = 0;
//    }
//    if (strlen($email) < 1) {
//        echo 'Error<br>';
//    }
//    if (strlen($key) < 1) {
//        echo 'Error<br>';
//    }
//    if (strlen($agreement) < 1) {
//        echo 'Error<br>';
//    }

ini_set('display_errors', 1);

foreach ($_POST as $key => $value) {
    echo $key . ':' . $value . '<br>';
}

if (isset($_POST['login'])) {
    $login = $_POST['login'];
} else {
    echo 'Login not defined.';
}

if (isset($_POST['agreement'])) {
    $agreement = $_POST['agreement'];
} else {
    $agreement = 0;
}
if (strlen($email) < 1) {
    echo 'Error<br>';
}
if (strlen($key) < 1) {
    echo 'Error<br>';
}
if (strlen($agreement) < 1) {
    echo 'Error<br>';
}
