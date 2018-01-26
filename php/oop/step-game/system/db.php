<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.01.18
 * Time: 18:22
 */
class DB {
    private $link;

    public function __construct($host, $port, $user, $pass, $db)
    {
        $this->link = new mysqli($host, $user, $pass, $db, $port);
        $this->link->set_charset('utf8');
    }

    public function query($sql) {
        $results = $this->link->query($sql);

        $data = array();

        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

}