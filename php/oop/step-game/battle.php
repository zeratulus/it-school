<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:14
 */

ini_set('display_errors', 1);

require_once 'config.php';
require_once 'helper.php';
require_once 'system/request.php';
require_once 'system/db.php';
require_once 'GameObjects/unit.php';
require_once 'GameObjects/battle_unit.php';

$request = new Request();

$db = new DB(DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_DB);

$player = new GameObjects\BattleUnit(100, 100, 100, 3, 5, 'img/cat.jpg', 'I am Player', 5, 5);
$enemy = new GameObjects\BattleUnit(100, 100, 100, 1, 5, 'img/slim.jpg', 'Slim', 5, 5);

if ($request->server['REQUEST_METHOD'] == 'POST') {
    $player->makeDamage($enemy);
    $enemy->makeDamage($player);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Battle</title>
    <link rel="stylesheet" href="view/styles/main.css">
    <link rel="stylesheet" href="view/styles/battle-form.css">
</head>
<body>

<form action="battle.php" method="post">

    <div class="battle-flex">
        <div class="battle-panel left">
            <h2 class="text-center"><?php echo $player->name; ?></h2>
            <img src="<?php echo $player->image; ?>" class="player">
            <p><?php showUnitParams($player); ?></p>
        </div>
        <div class="battle-panel right">
            <h2 class="text-center"><?php echo $enemy->name; ?></h2>
            <img src="<?php echo $enemy->image; ?>" class="enemy">
            <p><?php showUnitParams($enemy); ?></p>
        </div>
    </div>

    <div class="flex-center">
        <input type="submit" value="Attack!" class="btn btn-primary">
    </div>

</form>

</body>
</html>
