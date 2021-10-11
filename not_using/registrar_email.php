<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    $to = $_REQUEST['remail'];
    $from = 'educacion@fepac.com.mx';
    $name = 'Educacion FEPAC';
    $subject = 'Registro Satisfactorio';
    $cmessage = '';

$nombre = $_REQUEST['rnombre'];
$edad = $_REQUEST['redad'];
$email = $_REQUEST['remail'];
$tel = $_REQUEST['rtel'];
$escuela = $_REQUEST['rescuela'];
$nivel= $_REQUEST['rnivel'];
$curso= $_REQUEST["rcurso"];
$fecha= $_REQUEST["rfcurso"];
$now = $_REQUEST["rnow"];
$codigo= $_REQUEST["rccurso"];

$reg = ''.$nombre.'|'.$edad.'|'.$email.'|'.$tel.'|'.$escuela.'|'.$nivel.'|'.$curso.'|'.$fecha.'|'.$now.'|'.$codigo;

    $archivo = "constancias.txt";
    $f = fopen($archivo,"a");
    
    if($f)
    {
        fwrite($f,"\r\n".$reg);
        fclose($f);
    }
    
    // echo '<script type="text/javascript">
    // alert("Te has registrado satisfactoriamente.");
    // window.location.href="index.html";
    // </script>';
   $cmessage=" Le notificamos que usted {$nombre} se ha registrado a la conferencia  {$curso}  ";

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.fepac.com.mx';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'educacion@fepac.com.mx';                     //SMTP username
    $mail->Password   = 'fepac2021.!';                               //SMTP password
    // $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($from, $name);
    
    $mail->addAddress($to);     //Add a recipient
    
    $mail->addReplyTo($from);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content

    
    //$subject = "FEPAC Mexico.";

    $logo = 'img/logo/loder.png';
    $link = '#';

    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
    $body .= "</td></tr></thead><tbody><tr>";
    $body .= "<td style='border:none;'><strong>Nombre:</strong> {$name}</td>";
    $body .= "<td style='border:none;'><strong>Correo electronico:</strong> {$from}</td>";
    $body .= "</tr>";
    $body .= "<tr><td style='border:none;'><strong>Asunto:</strong> {$subject}</td></tr>";
    $body .= "<tr><td></td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
    $body .= "<tr><td></td></tr>";
    $body .= "<tr><td colspan='2' style='border:none;'><small>No olvides suscribierte a nuestras redes sociales</small></td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script type="text/javascript">
    alert("Te has registrado satisfactoriamente.");
    window.location.href="index.html";
    </script>';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



  


?>