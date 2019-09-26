<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Редактирование</title>
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
 <form method=post action='editsave.php'>   
    <textarea id="editor" style="height: 30em; width: 100%;" name='TA'>
<?php
 require "../config.php";
 
//$dbn = new SQLite3('../'.$nbasename);
//$dbn->query("CREATE TABLE IF NOT EXISTS `TEXT` (id  INTEGER PRIMARY KEY AUTOINCREMENT, fname text, nname TEXT, dt timestamp, dop text);");
//$dbu = new SQLite3('../'.$ubasename);
//$dbu->query("CREATE TABLE IF NOT EXISTS `USR` (id  INTEGER PRIMARY KEY AUTOINCREMENT, referer text, host TEXT, dt timestamp, spage text);");

 ////////////////////////////////////////////////////////////////////
 $a=$_GET['a'];
 $act=$_POST['act'];
 $act=$_POST['nbasename'];
 //$tpl=$_GET['tpl'];
 //echo $a;
 //echo $tpl;
 //echo '../'.$tpl.'/'.$a.'.tpl';
 if  ($act=='edit'){
 $r=file_get_contents('../'.$tpl.'/'.$a.'.tpl');}
 else{$r='';}
 echo $r;
 ////////////////////////////////////////////////////////////////////
 echo"</textarea>";
 echo"<input type=hidden value=".$a." name=a>";
 echo"<input type=hidden value=".$tpl." name=tpl>";
 echo"<input type=hidden value=".$act." name=act>";
 echo"<input type=hidden value=".$nbasename." name=nbasename>";
?>
<input type=submit value='Готово' action=submit>

</form>
</body>
</html>