<?php
//require "config.php";
$_COOKIE['username']?$user= $_COOKIE['username']:$user='Dummy';
$_COOKIE['userpass']?$pass= $_COOKIE['userpass']:$pass='Empty';
$dbn = new PDO("sqlite:".$ubasename,'','');
$sth = $dbn->prepare("select * from usr where name='".$user."'");
$sth->execute();
$r = $sth->fetch(PDO::FETCH_ASSOC);
$cookieOK=FALSE;
if($r['name']==$user&&$r['pass']==$pass){
$cookieOK=TRUE;
}
else{
$cookieOK=FALSE;
}
$nakt='';
$n='';
$nak_one= file_get_contents($tpl.'/one_new.tpl');
$main_news=file_get_contents($tpl.'/all_news.tpl');
$dbn = new PDO("sqlite:".$nbasename,'','');
if ($cookieOK){
	$sth = $dbn->prepare("select id,fname, nname, dop, strftime('%d.%m.%Y %H:%M',ts,'+3 HOURS') tsq, activ from  `TEXT` order by id desc limit ".$news_on_page);
}
else{
	$sth = $dbn->prepare("select id,fname, nname, dop, strftime('%d.%m.%Y %H:%M',ts,'+3 HOURS') tsq, activ from  `TEXT` where activ=1 order by id desc limit ".$news_on_page);
}
$sth->execute();
while ($r = $sth->fetch(PDO::FETCH_ASSOC)){
    $n=str_replace('%id%',$r['id'],$nak_one);
    $n=str_replace('%fname%',$r['fname'],$n);
    $n=str_replace('%nname%',(!$r['activ']?"<font color='RED'><u>".$r['nname']."</u></font>":$r['nname']),$n);
    $n=str_replace('%dop%',$r['dop'],$n);
	$n=str_replace('%ts%',$r['tsq'],$n);
    $nakt.=$n;    
}
/////////////////////////////////////////////////
$sth = $dbn->prepare("select count(*) cnt from TEXT ");//.$news_on_page
$sth->execute();
$r = $sth->fetch(PDO::FETCH_ASSOC);
$countpages=$r['cnt']/$news_on_page;

$nslider="1--$countpages";
/////////////////////////////////////////////////
$nak=str_replace('%main%',$nakt,$main_news);
$nak=str_replace('%nslider%',$nslider,$nak);
$dbn=null;
?>