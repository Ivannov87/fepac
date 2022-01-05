<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'getparams.php';
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';



//validar recaptcha

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Colocamos la clave secreta de reCAPTCHA v3 
    // define("SECRET_KEY", '6Ld7gUMdAAAAABKcIF4cTj9AVON9xRAlRB9HQUWX');

    $token = $_POST['token'];
    // $action = $_POST['action'];

    // // Mediante CURL hago un Post a la api de reCaptcha 
    // $datos = curl_init();
    // curl_setopt($datos, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    // curl_setopt($datos, CURLOPT_POST, 1);

    // // En el Post a la api de reCaptcha envio la Secret Key y el Token generado en la vista HTML
    // curl_setopt($datos, CURLOPT_POSTFIELDS, http_build_query(
    //     array(
    //         'secret' => SECRET_KEY,
    //         'response' => $token
    //     )
    // ));

    // // Obtengo una respuesta de reCaptcha y los datos obtenidos los decodifico para poder verificarlos 
    // curl_setopt($datos, CURLOPT_RETURNTRANSFER, true);
    // $respuesta = curl_exec($datos);
    // curl_close($datos);
    // $datos_respuesta = json_decode($respuesta, true);


    // // Verificamos los datos 
    if (!is_null($token) && strlen($token) > 0) {
        // if ($datos_respuesta["success"] == '1' && $datos_respuesta["action"] == $action && $datos_respuesta["score"] >= 0.4) {

        $params = new Params();
        $param= $params->getpwd();
        //Create an instance; passing `true` enables exceptions

        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        $to = "contacto@fepac.com.mx";
        $from = $_REQUEST['email'];
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $cmessage = $_REQUEST['message'];
        $zone = new DateTimeZone('America/Mexico_City');
        $dt = new DateTime("now", $zone);
        $now = $dt->format("Y-m-d") . "T" . $dt->format("H:i:s");
        $reg = '' . $name . '|pais|edad|genero|' . $from . '|telefono|escuela|nivel|curso|fechacurso|' . $now . '|codigo|' . $cmessage;

        $archivo = "contacto.txt";
        $f = fopen($archivo, "a");

        if ($f) {
            fwrite($f, "\r\n" . $reg);
            fclose($f);
        }


        try {
            //Server settings
            $mail->SMTPDebug = 2;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.fepac.com.mx';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'contacto@fepac.com.mx';                     //SMTP username
            $mail->Password   = $param;                              //SMTP password
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


            $subject = "FEPAC Mexico.";

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
            $body .= "</tbody></table>";
            $body .= "</body></html>";

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Mensaje enviado correctamente !';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {

        echo 'Mensaje Enviado';
    }
}
