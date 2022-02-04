<?php

//function counter()
//{
$archivo = "functions/counter.txt";
$contador = 0;

$f = fopen($archivo, "r");

if ($f) {
    $contador = fread($f, filesize($archivo));
    $contador = $contador + 1;
    fclose($f);

    $f = fopen($archivo, 'w');
    if ($f) {
        fwrite($f, $contador);
        fclose($f);
    }
}



//return $contador;
//}


echo  $contador;
