<?php 


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

    echo '<script type="text/javascript">
    alert("Te has registrado satisfactoriamente, en caso de no recibir la constancia en un periódo máximo de 72 hrs. favor de contactarnos a educacion@fepac.com.mx ");
    window.location.href="index.html";
    </script>';
   


?>