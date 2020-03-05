<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Редактирование и добавление новостей</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript">
      _editor_url = "../htmlarea/";
      _editor_lang = "en";
    </script>
    <script type="text/javascript" src="../htmlarea/htmlarea.js"></script>
    <script type="text/javascript">
      HTMLArea.loadPlugin("FullPage");
      function initDocument() {
        var editor = new HTMLArea("editor");
        editor.registerPlugin(FullPage);
        editor.generate();
      }
      HTMLArea.onload = initDocument;
    </script>
  </head>
  <body onload="HTMLArea.init()">

<?php
 require "../config.php";

 $id=$_GET['id'];
 $act=$_GET['act'];
 $a=$_GET['a'];
 $dbn = new PDO("sqlite:../".$nbasename,'','');
 $sth = $dbn->prepare("select * from `TEXT` where id=".$_GET['id']);
 if ($sth){$sth->execute();}
 if ($sth){$r = $sth->fetch(PDO::FETCH_ASSOC);}

 if($a){
	 echo"<form enctype='multipart/form-data' method=post action='editsave.php'>";
	 echo"<textarea id='editor' style='height: 40em; width: 100%;' name='TA'>";
	 $fd=file_get_contents('../'.$tpl.'/'.$a.'.tpl');
	 $act=500;
	 echo $fd;
 }
 else{
	 echo"<form enctype='multipart/form-data' method=post action='editsave.php'>";  
   //echo"Краткое название новости (только для себя)<input name='sname' type =text value='".$r['nname']."' size=100> <br>";
   echo"Название новости для первой страницы<input name='qname' type =text value='".$r['nname']."' size=100> <br>";
   echo"Фото новости(если не указать останется старое):<input type='file' name='userfile'><br><br>  ";
   echo"<textarea id='editor' style='height: 30em; width: 100%;' name='TA'>";

 
 if  ($act=='3'){
     $tfn='../'.$tpl.'/news/'.$r['id'].'_'.$r['fname'];	 
     $tr=file_get_contents($tfn);
	 $act=4;}
  else
     {$tr='';
      $act=1;
	  } 
 echo $tr;
 }
 echo"\n\n</textarea>";
 echo"<input type=hidden value='".$r['id']."' name='id'>";
 echo"<input type=hidden value='".$a."' name='a'>";
  echo"<input type=hidden value='".$fd."' name='fd'>";
 echo"<input type=hidden value='".$r['fname']."' name='fname'>";
 //echo"<input type=hidden value='".$r['nname']."' name='ename'>";
 echo"<input type=hidden value='".$act."' name='act'>";
?>
<input type=submit value='Готово' action=submit>

</form>
</body>
</html>