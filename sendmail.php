<?php
// ============================================================================================================== \\
// ==========================   Удалить ненужный кусок кода для корректной работы   ============================= \\
// ============================================================================================================== \\

use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);

$mail->setFrom('uvarov3123@gmail.com', 'Dmytro Uvarov');  // От кого письмо
$mail->addAddress('uvarov.dmutro@ukr.net');     // Кому отправить
$mail->Subject = 'Заявка с сайта';  // Тема письма


//Тело письма
$body = '<h1>Заголовок письма</h1>';

if (trim(!empty($_POST['name']))) {
	$body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['phone']))) {
	$body .= '<p><strong>Телефон:</strong> ' . $_POST['phone'] . '</p>';
}
if (trim(!empty($_POST['message']))) {
	$body .= '<p><strong>Сообщение:</strong> ' . $_POST['message'] . '</p>';
}

//Прикрепить файл
// if (!empty($_FILES['image']['tmp_name'])) {
//   //путь загрузки файла
//   $filePath = DIR . "/files/" . $_FILES['image']['name'];
//   //грузим файл
//   if (copy($_FILES['image']['tmp_name'], $filePath)) {
//     $fileAttach = $filePath;
//     $body .= '<p><strong>Фото в приложении</strong>';
//     $mail->addAttachment($fileAttach);
//   }
// }

$mail->Body = $body;

//Отправляем
if (!$mail->send()) {
	$message = 'Ошибка';
} else {
	$message = 'Данные отправлены!';
}
?>

<?php

// ============================================================================================================== \\
// ==========================================   SEND WITH SMTP SERVER   ========================================= \\
// ============================================================================================================== \\
/*

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . "/phpmailer/src/PHPMailer.php";
require_once __DIR__ . "/phpmailer/src/SMTP.php";
require_once __DIR__ . "/phpmailer/src/Exception.php";

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

try {
	//Server settings
	$mail->isSMTP();
	$mail->Host       = 'smtp.yandex.ru';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'uvarovdmitriy1@yandex.ru';
	$mail->Password   = 'shliiexlypsuvkco';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port       = 465;


	$mail->setFrom('uvarovdmitriy1@yandex.ru', 'Dmytro Uvarov');  // От кого письмо
	$mail->addAddress('uvarov.dmutro@ukr.net');     // Кому отправить
	$mail->Subject = 'Заявка с сайта';  // Тема письма

	//Тело письма
	$body = '<h1>Заголовок письма</h1>';

	if (trim(!empty($_POST['name']))) {
		$body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
	}
	if (trim(!empty($_POST['phone']))) {
		$body .= '<p><strong>Телефон:</strong> ' . $_POST['phone'] . '</p>';
	}
	if (trim(!empty($_POST['message']))) {
		$body .= '<p><strong>Сообщение:</strong> ' . $_POST['message'] . '</p>';
	}

	//Прикрепить файл
	// if (!empty($_FILES['image']['tmp_name'])) {
	// //путь загрузки файла
	// $filePath = DIR . "/files/" . $_FILES['image']['name'];
	// //грузим файл
	// 	if (copy($_FILES['image']['tmp_name'], $filePath)) {
	// 		$fileAttach = $filePath;
	// 		$body .= '<p><strong>Фото в приложении</strong>';
	// 		$mail->addAttachment($fileAttach);
	// 	}
	// }

	$mail->Body = $body;

	$mail->send();
	echo 'Письмо отправлено';
} catch (Exception $e) {
	echo "Ошибка: {$mail->ErrorInfo}";
}
*/
