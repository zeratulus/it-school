<?php
ini_set('display_errors', 1);

require_once ('mail.php');

$conf = array (
    'protocol' => 'smtp',
    'smtp_hostname' => 'mail.monsters-studio.com',
    'smtp_username' => 'site@monsters-studio.com',
    'smtp_password' => 'z{BB8@&;$#Xp',
    'smtp_port' => 25,
    'smtp_timeout' => 5
);

$mail = new Mail($conf);
//$mail->protocol = 'smtp';
//$mail->smtp_hostname = 'mail.monsters-studio.com';
//$mail->smtp_username = 'site@monsters-studio.com';
//$mail->smtp_password = 'z{BB8@&;$#Xp';

$mail->setSender($mail->smtp_username);
$mail->setFrom($mail->smtp_username);
$mail->setTo('ailus665@gmail.com');
$mail->setSubject('Send mail with PHP mail class');

$message = '
<html>
<head>
    <meta charset="UTF-8" content="text/html">
    <style>
        .text-center {text-align: center;}
    </style>
</head>
<body>

    <img src="http://monsters-studio.com/image/catalog/monsters-studio-logo.png">

    <h1 class="text-center">HTML mail body</h1>

    <p>Душа моя озарена неземной радостью, как эти чудесные весенние утра, которыми я наслаждаюсь от всего сердца. Я совсем один и блаженствую в здешнем краю, словно созданном для таких, как я. Я так счастлив, мой друг, так упоен ощущением покоя, что искусство мое страдает от этого. Ни одного штриха не мог бы я сделать, а никогда не был таким большим художником, как в эти минуты. Когда от милой моей долины поднимается пар и полдневное солнце стоит над непроницаемой чащей темного леса и лишь редкий луч проскальзывает в его святая святых, а я лежу в высокой траве у быстрого ручья и, прильнув к земле, вижу тысячи всевозможных былинок и чувствую, как близок моему сердцу крошечный мирок, что снует между стебельками, наблюдаю эти неисчислимые, непостижимые разновидности червяков и мошек и чувствую близость всемогущего, создавшего нас по своему подобию, веяние вселюбящего, судившего нам парить в вечном блаженстве, когда взор мой туманится и все вокруг меня и небо надо мной запечатлены в моей душе, точно образ возлюбленной, - тогда, дорогой друг, меня часто томит мысль: "Ах! Как бы выразить, как бы вдохнуть в рисунок то, что так полно, так трепетно живет во мне, запечатлеть отражение моей души, как душа моя - отражение предвечного бога!" Друг</p>

</body>
</html>';

$mail->setHtml($message);

//$mail->setText();

$mail->send();