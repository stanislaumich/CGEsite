<?php
//require "config.php";
$nakt='';
$n='';
$nak_one= file_get_contents($tpl.'/one_new.tpl');
//$news_on_page." in news php<br>";
$main_news=file_get_contents($tpl.'/all_news.tpl');
//$dbn = new SQLite3($nbasename);
$dbn = new PDO("sqlite:".$nbasename,'','');
//$dbn->query("select * from  `TEXT` order by id desc limit ".$news_on_page);
$sth = $dbn->prepare("select * from  `TEXT` order by id desc limit ".$news_on_page);
$sth->execute();
while ($r = $sth->fetch(PDO::FETCH_ASSOC)){
    $n=str_replace('%id%',$r['id'],$nak_one);
    $n=str_replace('%fname%',$r['fname'],$n);
    $n=str_replace('%nname%',$r['nname'],$n);
    $n=str_replace('%dop%',$r['dop'],$n);
    $nakt.=$n;
    
}
$nak=str_replace('%main%',$nakt,$main_news);

//$nak='qweqe';
$dbn=null;
?>