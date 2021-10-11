<?php

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
$q5 = $_REQUEST['rq5'];


$reg = '' . $nombre . '|' . $pais . '|' . $edad . '|' . $genero . '|' . $email . '|' . $tel . '|' . $escuela . '|' . $nivel . '|' . $curso . '|' . $fecha . '|' . $now . '|' . $codigo;

$archivo = "constancias.txt";
$f = fopen($archivo, "a");

if ($f) {
    fwrite($f, "\r\n" . $reg);
    fclose($f);
}

$reg2 = '' . $q1 . '|' . $q2 . '|' . $q3 . '|' . $q4 . '|' . $q5;

$archivo2 = "comentarios.txt";
$f2 = fopen($archivo2, "a");

if ($f2) {
    fwrite($f2, "\r\n" . $reg2);
    fclose($f2);
}


$reg3 = '' . $nombre . '|' . $pais . '|' . $edad . '|' . $genero . '|' . $email .'|'. $now .'|'. $q1 . '|' . $q2 . '|' . $q3 . '|' . $q4 . '|' . $q5;

$archivo3 = "user_comment.txt";
$f3 = fopen($archivo3, "a");

if ($f3) {
    fwrite($f3, "\r\n" . $reg3);
    fclose($f3);
}


echo '<script type="text/javascript">
    alert("Se ha registrado satisfactoriamente, la información que usted nos proporciona de sus datos personales para la emisión de su contancia de la conferencia que asiente, se encuentra protegida por la LFPDPPP ");
    window.location.href="congratulations.html";
    </script>';
