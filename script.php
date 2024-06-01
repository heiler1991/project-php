<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if(isset($_POST['send'])){
    $jmeno = htmlentities($_POST["jmeno"]);
    $email = htmlentities($_POST["email"]);
    $text = nl2br(htmlentities($_POST["text"]));
    $subject = "Poptávka";
//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

try {

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output na produkci vypnout
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.seznam.cz';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'testwebpage@seznam.cz';                     //SMTP username
    $mail->Password   = '*******';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPSecure = 'ssl';
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom('testwebpage@seznam.cz');
    $mail->addAddress('testwebpage@seznam.cz', 'Joe User');     //Add a recipient
    $mail->addReplyTo($email); //answer to sender 

    if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK)  {
        $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']); 
    }

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject."-".$jmeno." ".$email;
    $mail->Body = $text;

    $mail->send();
    
    header('Location: poptavkasent.php');
    } catch (Exception $e) {
    echo "Email nemohl být odeslán. Mailer Error: {$mail->ErrorInfo}";
}}
    exit;
?>