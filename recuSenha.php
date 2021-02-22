<?php
include_once __DIR__ . '/phpmailer/PHPMailerAutoload.php';

$mail = new \PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'contasface1@gmail.com';
$mail->Password = '96039589';
$mail->setFrom('gabriel.gclc@gmail.com', 'Meu Nome');
$mail->addReplyTo('replyto@meusite.com', 'Meu Nome');
$mail->addAddress('', '');
$mail->addCC('lucas1.stoly@gmail.com', 'aaa');
$mail->addBCC('lucas1.stoly@gmail.com', 'bbb');
$mail->Subject = 'Envio de email';
$mail->CharSet = 'UTF-8';
$mail->msgHTML("<p>Mensagem de <b>teste</b>!</p>");
$mail->AltBody = 'Mensagem de A';
//$mail->addAttachment(__DIR__ . '/logo-devmedia.png');

if (!$mail->send()) {
          die("Erro no envio do e-mail: {$mail->ErrorInfo}");
}

echo 'Mensagem enviada com sucesso';
?>