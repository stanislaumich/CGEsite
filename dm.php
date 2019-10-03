<?php
 require "config.php";
 echo "Папка пользователя:".$_SERVER['SERVER_NAME']."<br>";
 echo'<html><meta charset="utf-8"><head></head><body>'.PHP_EOL; 
 echo"<table border=1><tr>";
 echo"<td>";
  echo'Редактирование меню "Структура"';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/fledits.php?a=struct'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'Редактирование меню "Документы"';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/fledits.php?a=docs'>
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
  echo"Редактирование ещё чего то";
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
  echo"Редактировать новость";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=cnews'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=hidden value='edit' name=act>
  <input type=hidden value='".$nbasename."' name=nbasename>
  <input type=submit value='Выбрать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
 echo"Создать вопрос";
echo"</td>";
echo"<td>";
 echo"<form method=post action='dm/fedits.php?a=cnews'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=hidden value='edit' name=act>
 <input type=hidden value='".$fbasename."' name=fbasename>
 <input type=submit value='Добавить'>
</form>";
echo"</td>";
echo "</tr><tr>";
echo"<td>";
echo"Редактировать вопрос";
echo"</td>";
echo"<td>";
echo"<form method=post action='dm/fedits.php?a=cnews'>
<input type=hidden value='".$tpl."' name=tpl>
<input type=hidden value='edit' name=act>
<input type=hidden value='".$fbasename."' name=fbasename>
<input type=submit value='Добавить'>
</form>";
echo"</td>";
 echo"</tr></table>";
 echo"</body></html>"; 
?>