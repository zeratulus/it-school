<?php

require_once 'config.php';
require_once 'request.php';
require_once 'mail.php';
require_once 'response.php';

$request = new Request();

$name = $request->post['fio'];
$email = $request->post['email'];
$phone = $request->post['telephone'];

//if (!empty($name) && !empty($email) && !empty($phone)) {
//    $mail = new Mail();
//    $mail->smtp_hostname = SMTP_HOST;
//    $mail->smtp_username = SMTP_USER;
//    $mail->smtp_password = SMTP_PASS;
//    $mail->smtp_port = SMTP_PORT;
//
//    $mail->setFrom($email);
//    $mail->setTo(EMAIL_TO);
//    $mail->setSender($email);
//
//    $subject = date("Y-m-d H:i:s") . ' Новая регистрация на сайте.';
//
//    $mail->setSubject($subject);
//
    $body = 'Имя: ' . $name . $mail->newline;
    $body .= 'Почта: ' . $email . $mail->newline;
    $body .= 'Телефон: ' . $phone;
//
//    $mail->setText($body);

//    echo $subject;
    echo $body;

//    $mail->send();

    echo '<h1 style="text-align: center;">Вы успешно зарегестрировались на курс. Ждите мы скоро Вам перезвоним!</h1>';

    echo '<h2 style="text-align: center;">Вы вернётесь на сайт через 5 секунд.</h2>';

//    echo '<script>setTimeout(function() {window.location.href = "../index.html"}, 5000);</script>';

//}