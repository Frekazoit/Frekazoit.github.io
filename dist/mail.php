<!-- <? mail("frekazoit11@gmail.com", "тестовый заголовок письма", "тестовый текст сообщения", "Content-type: text/html; charset=utf-8"); ?>
Пример кода с проверкой, если отправка не произошла, выдаст ошибку:
<? 
// почта
$to = "frekazoit11@gmail.com";
// атрибуты формы 
$name = clear_data($_POST['name']);
$email = clear_data($_POST['email']);
$text = clear_data($_POST['text']);
// заголовок 
$subject = "тестовый заголовок письма";
// текст письма 
// от кого
$from = "noreply@mail.com";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= "From: <".$from.">\r\n";
// куда отвечать 
$headers .= "Reply-To: noreply@mail.com\r\n";
// $message = 'Имя: '. $name."\n" . 'Email: '. $email."\n" . 'Text: '. $text."\n";
$message = '
	<html>
	<body>
	<center>
	<table border="1" cellpadding="6" cellspacing="0" width="90% bordercolor="#DBDBDB">
	<tr>
	<td colspan="2" align="center" bgcolor="#E4E4E4E4"<b>Информация от работодателя</b>>
	</td>
	</tr>
	</table>
	</center>
	</body>
	</html>
';
$message .= '<tr>
<td><b>Имя контакта</b></td>
<td>'. $name .'</td>
</tr>
<td><b>Email контакта</b></td>
<td>'. $email .'</td>
</tr>
<td><b>Текст сообщения</b></td>
<td>'. $text .'</td>
</tr>';

// функция очистки 
function clear_data($val) {
	// удаляет все пробелы
	$val = trim($val);
	// удаляет слешы 
	$val = stripslashes($val);
	// преобразует html в спец сущности
	$val = htmlspecialchars($val);
	return $val;
};


mail($to,$subject,$message,$headers);

if (mail($to,$subject,$message,$headers)) {
	echo "OK";
}
else {
	echo "ERROR";
}?>