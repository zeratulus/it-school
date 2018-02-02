<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 02.02.18
 * Time: 17:51
 */

require_once 'db.php';
require_once '../GameObjects/unit.php';

class Loader
{
    private $db;

    public function __construct(DB $db)
    {
        $this->db = $db;
    }

    public function __destruct()
    {
        $this->db = NULL;
    }

    public function enemy($enemy_id)
    {
        $result = $this->db->query('SELECT * FROM enemies WHERE enemy_id = ' . (int)$enemy_id . ' LIMIT 1');
        return $result->row;
    }

    public function battle($battle_id)
    {
        $result = $this->db->query('SELECT * FROM battles WHERE id = ' . (int)$battle_id . ' LIMIT 1');
        return $result->row;
    }

    public function getRandomEnemy()
    {
        $results = $this->db->query('SELECT MIN(enemy_id) as minimum, MAX(enemy_id) as maximum FROM enemies');
        $enemy_id = rand($results->row['minimum'], $results->row['maximum']);
        return $this->enemy($enemy_id);
    }

    public function updateBattle($battle_id, $player_id, $enemy_id, GameObjects\Unit $player, GameObjects\Unit $enemy)
    {
        $this->db->query('UPDATE battles SET player_id=' . $player_id . ', p_hp=' . $player->hp . ', p_ap=' . $player->ap . ', p_mp=' . $player->mp . ', e_hp=' . $enemy->hp . ', e_ap=' . $enemy->ap . ', e_mp=' . $enemy->mp . ', enemy_id=' . $enemy_id . ' WHERE id=' . (int)$battle_id)
    }

}