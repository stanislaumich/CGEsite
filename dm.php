<?php
 require "config.php";
 // кукисы и авторизация
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
$dbn=null;
 // работаем
 if ($cookieOK){

 echo"<a href='../index.php' target=blank>Открыть сайт в новой вкладке</a><br><br>";
 echo'<html><meta charset="utf-8"><head></head><body>'; 
 echo"<table border=1><tr>";
 echo"<td>";
  echo'Редактирование меню "Структура"';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=struct'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Документы"';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=docs'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Услуга"';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=usl'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
  echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Процедуры"';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=admproc'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Обращения"';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=obr'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование правой части';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=right'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr>";
 echo "<tr>";
 echo"<td>";
  echo"Создать новость";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?act=0'>
  <input type=hidden value='".$tpl."' name='tpl'>
  <input type=hidden value='add' name='act'>
  <input type=hidden value='".$nbasename."' name='nbasename'>
  <input type=submit value='Добавить'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo"Редактировать или удалить новость";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/startedits.php'>
       <input type=submit value='Открыть список'></form>";
 echo"</td>";
 echo "</tr><tr>";
  echo"<td>";
  echo"Редактировать горячую линию";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=grafik'>
       <input type=submit value='Редактировать'></form>";
 echo"</td>";
 echo"</tr>";
 
 echo"<tr>";
 echo"<td>";
  echo"Редактировать плашку объявления";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=plashka'>
       <input type=submit value='Редактировать'></form>";
 echo"</td>";
 echo"</tr>";
 
  echo"<tr>";
 echo"<td>";
  echo"Редактировать подвал";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=podval'>
       <input type=submit value='Редактировать'></form>";
 echo"</td>";
 echo"</tr>";
 
 echo"</table>";
 echo "<br><br>";
 echo "<h3>Редактирование отделов и прочих разделов сайта</h3>";////////////////////////////////////////////////////////////////////////////////
 echo"<table border=1><tr>";
 echo"<td>";
  echo'Редактирование меню "Главный врач"';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=glvr'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Секретарь"';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=sekret'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Бухгалтер"';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=buh'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
  echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Отдел Гигиены"';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=gigi'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Эпидотдел"';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=epid'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
 echo "</tr>";
 echo "<tr>";
 echo"<td>";
  echo'Редактирование меню "Лаботдел"';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=lab'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr>";
 echo "<tr>";
 echo"<td>";
  echo'Редактирование Главной страницы';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=index'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr>";

 echo "<tr></tr></table>";
 echo"</body></html>";
 }
 else{
    //echo"Not auth!";
    $authtext=file_get_contents('dm/auth.htm');
    echo $authtext;
 } 
?>