<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('dan.project1101@gmail.com', 'Покупатель');
	//Кому отправить
	$mail->addAddress('danilka0622@gmail.com');
	//Тема письма
	$mail->Subject = 'Данные покупателя';

	//Рука


	//Тело письма
	$body = '<h1>Встречайте письмо!</h1>';
	
	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Получатель (ФИО полностью):</strong> '.$_POST['name'].'</p>';
	}
	
	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['number']))){
		$body.='<p><strong>Номер телефона:</strong> '.$_POST['number'].'</p>';
	}
	if(trim(!empty($_POST['city']))){
		$body.='<p><strong>Город:</strong> '.$_POST['city'].'</p>';
	}
	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
	}
	


	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>