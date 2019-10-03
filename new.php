<?php
//$n
$file='';
$dbn = new PDO("sqlite:".$nbasename,'','');
$sth = $dbn->prepare("select * from  `TEXT` where id=".$n);
$sth->execute();
$r = $sth->fetch(PDO::FETCH_ASSOC);
$file=$news.'/'.$r['id'].'_'.$r['fname'];
$nak=file_get_contents($file);

$dbn=null;
?>