<?php 


$q1 = $_REQUEST['rq1'];
$q2 = $_REQUEST['rq2'];
$q3 = $_REQUEST['rq3'];
$q4 = $_REQUEST['rq4'];
$q5 = $_REQUEST['rq5'];



$reg = ''.$q1.'|'.$q2.'|'.$q3.'|'.$q4.'|'.$q5;

    $archivo = "comentarios.txt";
    $f = fopen($archivo,"a");
    
    if($f)
    {
        fwrite($f,"\r\n".$reg);
        fclose($f);
    }

    echo '<script type="text/javascript">
    alert("Fomento Educativo A.C. agradece tus comentarios y te esperamos siempre en nuestras próximas conferencias.");
    window.location.href="index.html";
    </script>';
   


?>