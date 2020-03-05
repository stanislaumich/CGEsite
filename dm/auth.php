<?php
require "../config.php";
$user= $_POST['username'];
$pass= $_POST['userpass'];
$dbn = new PDO("sqlite:../".$ubasename,'','');
$sth = $dbn->prepare("select * from usr where name='".$user."'");
$sth->execute();
$r = $sth->fetch(PDO::FETCH_ASSOC);
$ok=TRUE;
if(($r['name']==$user)&&($r['pass']==$pass)){
	setcookie ('username', $user, time()+60*60*24*1, $path = "/", $secure = FALSE)?$ok=TRUE:$ok=FALSE;
	setcookie ('userpass', $pass, time()+60*60*24*1, $path = "/", $secure = FALSE);
	echo"<html><body><a href='/dm.php'>".($ok?"Ок!":"NO")."</a></body></html>";
}
else{
	echo"<html><body><a href='/dm.php'>Отказано в доступе</a></body></html>";
	echo $user.'-ui; ';echo $pass.'-pi; ';echo $r['name'].'-ub; ';echo $r['pass'].'-pb;'; 
}
$dbn=null;
?>