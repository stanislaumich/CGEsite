<HTML> 

<HEAD> 

<TITLE>Отправка сообщения с вложением</TITLE> 

</HEAD> 

<BODY> 

<H3> <center><font color=#1E90FF>Отправка сообщения с вложением</font></H3> 

<center> 

<table width=1 border=0> 

<form action=post2.php enctype='multipart/form-data' method=post> 



<tr><td width=50%>To:</td><td align=right><input type=text name=mail_to maxlength=32></td></tr> 

<tr><td width=50%>Subject:</td><td align=right><input type=text name=mail_subject maxlength=64></td></tr> 

<tr><td colspan=2>Сообщение:<br><textarea cols=50 rows=8 name=mail_msg></textarea></td> 

<tr><td width=50%>Photo:</td><td align=right><input type=file name=mail_file maxlength=64></td></tr> 

</tr><tr><td colspan=2><input type=submit value='Отправить'></td></tr> 

</form> 

</table> 

</center> 

</BODY> 

</HTML>