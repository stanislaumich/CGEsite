<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Редактирование завершено</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$a=$_POST['a'];
$tpl=$_POST['tpl'];
$fn=$tpl.'/'.$a.'.tpl';
$ta=$_POST['TA'];
$fbasename=$_POST['fbasename'];
//echo $ta;
if($act=='edit'){
file_put_contents('../'.$fn,$ta);
} else{
  $t = md5(uniqid("")); // без префикса
  $token = md5(uniqid(rand(),1)); // лучше, труднее взломать
  $fn=$token.'.fqs';
  $dbn = new PDO("sqlite:../".$fbasename,'','');
  $r=$dbn->exec("insert into `TEXT` (id,fname,nname,dt,dop) values(null,'".$fn."','','','')");
  $res=$dbn->lastInsertID();
  //echo $res.'-'.$r;
  //print_r ($dbn->errorInfo());
  file_put_contents('../'.$tpl.'/faq/'.$res.'_'.$fn,$ta);
  $dbn=null;
}
if ($res!=0){
   echo"<font color=green><center>Завершено успешно</font><br>";}
else{
   echo"<center><font color=red>Ошибка добавления новости</font><br>";}
echo"<a href='../index.php?p=faq&n=".$res."'>Посмотреть результат</a><br>";
echo"<a href='../dm.php'>Перейти в панель управления</a></center>";
?>
</body>
</html>