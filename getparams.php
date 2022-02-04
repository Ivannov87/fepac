<?php

class Params
{
    public function getpwd()
    {
        $archivo = "assets/files/email/contact.txt";
        $f = fopen($archivo, "r");
        $pwd = '';

        if ($f) {
           $b64pwd =fread($f, filesize($archivo)); 
           $pwd = base64_decode($b64pwd);
           fclose($f);
        }

        return $pwd;
    }

    public function getrecpwd()
    {
        $archivo = "assets/files/email/talento.txt";
        $f = fopen($archivo, "r");
        $pwd = '';

        if ($f) {
           $b64pwd =fread($f, filesize($archivo)); 
           $pwd = base64_decode($b64pwd);
           fclose($f);
        }

        return $pwd;
    }
}
