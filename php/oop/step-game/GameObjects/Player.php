<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 09.02.18
 * Time: 18:05
 */

namespace GameObjects;


use GameSystem\DB;
use GameSystem\DBInstance;

class Player extends DBInstance
{

    public function __construct(DB $db)
    {
     parent::__construct($db);
    }

    public function auth($login, $password) {

        $result = $this->db->query('SELECT * FROM users WHERE login = ' . $login . 'LIMIT 1');

        $hash = md5($password . $result['salt']);

        if ($result['hash'] == $hash) {
            return true;
        } else {
            return false;
        }

    }

    public function isLoginExists($login) {
        $results = $this->db->query('SELECT * FROM users WHERE login = \'' . $login .'\'');
        if ($results->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data = array()) {
        if (!$this->isLoginExists($data['login'])) {
            $salt = salt();
            $hash = md5($data['password'] . $salt);
            $this->db->query('INSERT INTO players(login, email, hash, salt, lvl, exp, gold, items_id) VALUES (\''.$data['login'].'\', \''.$data['email'].'\', \''.$hash.'\', \''.$salt.'\', 0, 0, 0, NULL);');
            return true;
        } else {
            return false;
        }
    }

}