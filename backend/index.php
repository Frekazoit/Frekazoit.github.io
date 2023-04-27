<?php


$to = 'Frekazoit@yandex.ru';
// принимаем из функции данные 
$name = clear_data($_POST['name']);
$email = clear_data($_POST['email']);
$text = clear_data($_POST['text']);
$subject = 'Заявка с сайта';

$headers = "From: webmaster@site.ru\r\n";
$headers .= "Replay-To: webmaster@site.ru\r\n";
$headers .= "X-Mailer: PHP/". phpversion();
$headers .= "Content-type: text/html; charset=utf-8\r\n";
// 1 откуда пришло 2 куда отвечать 3 версия php
$message = 'Имя'. $name."\n" . 'email'. $email."\n" . 'сообщение'. $text."\n";

function clear_data($val) {
    $val = trim($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);
    return $val;
};


mail($to, $subject, $message, $headers);
