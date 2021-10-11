<?php


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


$reg = '' . $nombre . '|' . $pais . '|' . $edad . '|' . $genero . '|' . $email . '|' . $tel . '|' . $escuela . '|' . $nivel . '|' . $curso . '|' . $fecha . '|' . $now . '|' . $codigo;

$archivo = "constancias.txt";
$f = fopen($archivo, "a");

if ($f) {
    fwrite($f, "\r\n" . $reg);
    fclose($f);
}

echo '<script type="text/javascript">
    alert("Te has registrado satisfactoriamente, en caso de no recibir la constancia en un periódo máximo de 72 hrs. favor de contactarnos a educacion@fepac.com.mx. La información que usted nos proporciona de sus datos personales para la emisión de su contancia de la conferencia que asiente, se encuentra protegida por la LFPDPPP ");
    window.location.href="index.html";
    </script>';
