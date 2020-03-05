<?php
 require "config.php";
 $css=file_get_contents($tpl.'/'.$_GET['f'].'.css');
 echo $css; 
 ?>