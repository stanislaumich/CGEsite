<?php
  require "../config.php";
$_COOKIE['username']?$user= $_COOKIE['username']:$user='Dummy';
$_COOKIE['userpass']?$pass= $_COOKIE['userpass']:$pass='Empty';
$dbn = new PDO("sqlite:../".$ubasename,'','');
$sth = $dbn->prepare("select * from usr where name='".$user."'");
$sth->execute();
$r = $sth->fetch(PDO::FETCH_ASSOC);
$cookieOK=FALSE;
if($r['name']==$user&&$r['pass']==$pass){
$cookieOK=TRUE;
}
else{
die("FALSE");
}
$act=$_GET['act'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Выбор новости</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
  require "../config.php";
  $dbn = new PDO("sqlite:../".$nbasename,'','');
  $news_on_page=50;

if (!$act){
  
  $sth = $dbn->prepare("select * from  `TEXT` order by id desc limit ".$news_on_page);
  // (id,fname,nname,dt,dop) values(null,'".$fn."','".$lnames."','','')
  $sth->execute();
  echo"<h3>Управление новостями</h3><br>";
  echo"<a href='../index.php'>Посмотреть результат на главной</a><br>";
  echo"<a href='../dm.php'>Перейти в начало панели управления</a><br><br>";
  echo"<table border=1>";
while ($r = $sth->fetch(PDO::FETCH_ASSOC)){
	echo"<tr>";
    echo("<td><b><font color='".($r['activ']?"green'>":"red'>").$r['nname']."</font></b></td>");
	echo("<td><a href='edits.php?act=3&id=".$r['id']."'>Редактировать эту новость</a></td>");
	echo("<td><a href='startedits.php?act=1&id=".$r['id']."' style='color:red;'>Удалить эту новость</a></td>");
	echo("<td><a href='startedits.php?act=8&id=".$r['id']."&op=1' style='color:green;'>Включить эту новость</a></td>");
	echo("<td><a href='startedits.php?act=8&id=".$r['id']."&op=0' style='color:red;'>Выключить эту новость</a></td>");
    echo"</tr>";
   }
}
if ($act==1){
 $sth = $dbn->prepare("select * from `TEXT` where id=".$_GET['id']);
 $sth->execute();
 $r = $sth->fetch(PDO::FETCH_ASSOC);
 echo($r['nname']." -- <a href='startedits.php?act=2&id=".$_GET['id']."'>Действительно удалить эту новость???</a> <br>");
}

if ($act==8){
 $sth = $dbn->prepare("update `TEXT` set activ=".$_GET['op']." where id=".$_GET['id']);
 $sth->execute();
 echo($r['nname']." Новость ".($_GET['op']?"Включена":"Выключена")." <br>");
 echo"<a href='../index.php'>Посмотреть результат на главной</a><br>";
 echo"<a href='../dm.php'>Перейти в начало панели управления</a><br><br>";
}

if ($act==2){
 $sth = $dbn->prepare("delete from  `TEXT` where id=".$_GET['id']);
 $sth->execute();
 echo ("Новость удалена<br><a href='startedits.php'>Управление новостями</a> <br>");
 echo ("<a href='../dm.php'>Общая панель управления</a> <br>");
 echo ("<a href='startedits.php'>Редактирование и удаление новостей</a> <br>");
}
if ($act==3){
 $sth = $dbn->prepare("select * from `TEXT` where id=".$_GET['id']);
 $sth->execute();
 $r = $sth->fetch(PDO::FETCH_ASSOC);
 echo($r['nname']." -- <a href='startedits.php?act=2&id=".$_GET['id']."'>Действительно удалить эту новость???</a> <br>");
 echo ("<a href='startedits.php'>Редактирование и удаление новостей</a> <br>");
}  


?>

</body>
</html>