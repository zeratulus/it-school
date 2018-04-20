<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 20.04.18
 * Time: 17:34
 */

if (isset($_POST['fio'])) {
    if (!empty($_POST['fio'])) {

        mb_internal_encoding("UTF-8");

        $fio = explode(' ', $_POST['fio']);

        if (count($fio) < 3) {
            echo 'Введите полное ФИО через пробелы.';
            die();
        }
        \
        $name = mb_substr($fio[1], 0, 1);
        $s_name = mb_substr($fio[2], 0, 1);

        $shorted = $fio[0] . ' ' . mb_strtoupper($name) . '. ' . mb_strtoupper($s_name) . '.';

        echo $shorted;

        header('Content-Type: text/html; charset=utf-8', true);

    }
}