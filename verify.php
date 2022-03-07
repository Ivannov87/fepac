<?php

if (isset($_POST['docto']) && !empty($_POST['docto'])) {
   $dir = "constanciasfepac/" . $_POST["docto"] . '.pdf';
   if (file_exists($dir)) {
      echo 'true';
   } else {
      echo 'false';
   }
}
