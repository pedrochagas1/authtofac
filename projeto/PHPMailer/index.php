<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Require
//require 'src/PHPMailerAutoload.php';

require 'src/Exception.php'; 
require 'src/PHPMailer.php';
require 'src/SMTP.php'; 

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth   = true;
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Username   = 'redesocialnomad@gmail.com';                     //SMTP username
    $mail->Password   = 'ruirdyjixbymejnc';                               //SMTP password gerado exclusivo para este envio, não é a mesma senha do email.
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = 

    //Recipients
    $mail->setFrom('redesocialnomad@gmail.com', 'Gustavo');
    $mail->addAddress('redesocialnomad@gmail.com', 'Gustavo');     //Add a recipient
    $mail->addReplyTo('redesocialnomad@gmail.com', 'Gustavo');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Assunto aqui';
    $mail->Body    = 'Corpo do email em  <b>HTML!</b>';
    $mail->AltBody = 'Corpo do email para clientes de email sem HTML.';

    $mail->send();
    echo 'Mensagem enviada com sucesso.';
} catch (Exception $e) {
    echo "A mensagem não pode ser enviada. CODIGO DO ERRO: {$mail->ErrorInfo}";
}

?>
