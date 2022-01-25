<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // // Colocamos la clave secreta de reCAPTCHA v3 
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

        //registro
        $nombre = $_REQUEST['rnombre'];
        $pais = $_REQUEST['rpais'];
        $edad = $_REQUEST['redad'];
        $genero = $_REQUEST['rgenero'];
        $email = $_REQUEST['remail'];
        $tel = $_REQUEST['rtel'];
        $escuela = $_REQUEST['rescuela'];
        $nivel = $_REQUEST['rnivel'];
        $curso = $_REQUEST["rcurso"];
        $fecha = $_REQUEST["rfcurso"];
        $now = $_REQUEST["rnow"];
        $codigo = $_REQUEST["rccurso"];

        //comentarios
        $q1 = $_REQUEST['rq1'];
        $q2 = $_REQUEST['rq2'];
        $q3 = $_REQUEST['rq3'];
        $q4 = $_REQUEST['rq4'];
        $q5 = str_replace(array("\n","\r","\r\n"),' ' ,$_REQUEST['rq5']);
        $q5 = preg_replace('/\s+/',' ',$q5);

        $reg = '' . $nombre . '|' . $pais . '|' . $edad . '|' . $genero . '|' . $email . '|' . $tel . '|' . $escuela . '|' . $nivel . '|' . $curso . '|' . $fecha . '|' . $now . '|' . $codigo;

        $archivo = "functions/constancias.txt";
        $f = fopen($archivo, "a");

        if ($f) {
            fwrite($f, "\r\n" . $reg);
            fclose($f);
        }

        $reg2 = '' . $q1 . '|' . $q2 . '|' . $q3 . '|' . $q4 . '|' . $q5;

        $archivo2 = "functions/comentarios.txt";
        $f2 = fopen($archivo2, "a");

        if ($f2) {
            fwrite($f2, "\r\n" . $reg2);
            fclose($f2);
        }



        $reg3 = $nombre . '|' . $pais . '|' . $edad . '|' . $genero . '|' . $email .'|'. $now .'|'. $q1 . '|' . $q2 . '|' . $q3 . '|' . $q4 . '|' . $q5;

        $archivo3 = "functions/user_comment.txt";
        $f3 = fopen($archivo3, "a");

        if ($f3) {
            fwrite($f3, "\r\n" . $reg3);
            fclose($f3);
        }


        echo '<script type="text/javascript">
            alert("Se ha registrado satisfactoriamente, la información que usted nos proporciona de sus datos personales para la emisión de su contancia de la conferencia que asiente, se encuentra protegida por la LFPDPPP ");
            window.location.href="congratulations.html";
            </script>';

        }
        else {
        
            echo '<script type="text/javascript">
            alert("Se ha registrado satisfactoriamente, la información que usted nos proporciona de sus datos personales para la emisión de su contancia de la conferencia que asiente, se encuentra protegida por la LFPDPPP ");
            window.location.href="congratulations.html";
            </script>';
                }
}

