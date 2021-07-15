<?php

//function counter()
//{
    $archivo = "counter.txt";
    $f = fopen($archivo,"r");
    $contador =0;

    if($f)
    {
        $contador = fread($f,filesize($archivo));
        $contador = $contador+1;
        fclose($f);
    }

    $f = fopen($archivo,"w+");
    if($f)
    {
        
        fwrite($f,$contador);
        fclose($f);
    }

    //return $contador;
//}


echo  $contador;

?>