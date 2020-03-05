<?php
 require "config.php";
 // кукисы и авторизация
 if ($_COOKIE['username']){
 // работаем
 //echo "Папка пользователя:".$_SERVER['SERVER_NAME']."<br>";
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
 echo "</tr><tr>";
 echo"<td>";
  echo"<a href='dm/edits.php?a=struct'>Редактирование ещё чего то</a>";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=else'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo"Создать новость";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=cnews'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=hidden value='add' name=act>
  <input type=hidden value='".$nbasename."' name=nbasename>
  <input type=submit value='Добавить'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo"<a href='dm/edits.php?a=struct'>Редактировать новость</a>";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=cnews'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=hidden value='edit' name=act>
  <input type=submit value='Добавить'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"</tr></table>";
 echo"</body></html>";
 }
 else{
    //echo"Not auth!";
    $authtext=file_get_contents('dm/auth.htm');
    echo $authtext;
 } 
?>