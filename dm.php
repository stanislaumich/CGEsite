<?php
 require "config.php";
 echo "Папка пользователя:".$_SERVER['SERVER_NAME']."<br>";
 echo'<html><meta charset="utf-8"><head></head><body>'.PHP_EOL; 
 echo"<table border=1><tr>";
 echo"<td>";
  echo'<font color=green><b>Редактирование меню "Структура"</b></font>';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/fledits.php?a=struct'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'<font color=green><b>Редактирование меню "Документы"</b></font>';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/fledits.php?a=docs'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'<font color=green><b>Редактирование меню "Услуга"</b></font>';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=usl'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
  echo "</tr><tr>";
 echo"<td>";
  echo'<font color=green><b>Редактирование меню "Процедуры"</b></font>';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=admproc'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'<font color=green><b>Редактирование меню "Обращения"</b></font>';
 echo"</td>";
 echo"<td>";
 echo"<form method=post action='dm/edits.php?a=obr'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=submit value='Редактировать'>
</form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo'<font color=green><b>Редактирование правой части</b></font>';
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=right'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo"Редактирование ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php?a=else'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=submit value='Редактировать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo"<font color=blue><b>Создать новость</b></font>";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/edits.php'>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=hidden value='add' name=act>
  <input type=hidden value='".$nbasename."' name=nbasename>
  <input type=submit value='Добавить'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
  echo"<font color=blue><b>Редактировать новость</b></font>";
 echo"</td>";
 echo"<td>";
  echo"<form method=post action='dm/select.php '>
  <input type=hidden value='".$tpl."' name=tpl>
  <input type=hidden value='edit' name=act>
  <input type=hidden value='".$nbasename."' name=nbasename>
  <input type=hidden value='edits' name=next>
  <input type=submit value='Выбрать'>
 </form>";
 echo"</td>";
 echo "</tr><tr>";
 echo"<td>";
 echo"<font color=red><b>Создать вопрос</b></font>";
echo"</td>";
echo"<td>";
 echo"<form method=post action='dm/fedits.php?a=cnews'>
 <input type=hidden value='".$tpl."' name=tpl>
 <input type=hidden value='add' name=act>
 <input type=hidden value='".$fbasename."' name=fbasename>
 <input type=submit value='Добавить'>
</form>";
echo"</td>";
echo "</tr><tr>";
echo"<td>";
echo"<font color=red><b>Редактировать вопрос</b></font>";
echo"</td>";
echo"<td>";
echo"<form method=post action='dm/select.php?a=cnews'>
<input type=hidden value='".$tpl."' name=tpl>
<input type=hidden value='edit' name=act>
<input type=hidden value='fedits' name=next>
<input type=hidden value='".$fbasename."' name=fbasename>
<input type=submit value='Выбрать'>
</form>";
echo"</td>";
 echo"</tr></table>";
 echo"</body></html>"; 
?>