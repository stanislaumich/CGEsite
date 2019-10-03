<?php
require "config.php";
$alert="";
//$dbn = new SQLite3($nbasename);
//$dbn = new PDO("sqlite:".$nbasename,'','');
//$dbn->query("CREATE TABLE IF NOT EXISTS `TEXT` (id  INTEGER PRIMARY KEY AUTOINCREMENT, fname text, nname TEXT, dt timestamp, dop text);");
//$dbu = new SQLite3($ubasename);
//$dbu = new PDO("sqlite:".$ubasename,'','');
//$dbu->query("CREATE TABLE IF NOT EXISTS `USR` (id  INTEGER PRIMARY KEY AUTOINCREMENT, referer text, host TEXT, dt timestamp, spage text);");


$nak = $_GET['p'];
$n = $_GET['n'];

$main=file_get_contents($tpl."/index.tpl");

if (isset($nak)) {
        if ($nak=='new'){
                include 'new.php';
        }else{
        $f=$tpl."/".$nak.".tpl";
        file_exists ($f)?$nak=file_get_contents($tpl."/".$nak.".tpl"):$nak=file_get_contents($tpl."/dummy.tpl");
        } 
        }
else{
        include 'news.php';      
}
///////////////////////////////
///////////////////////////////
$main=str_replace('%main%',$nak,$main);
$right=file_get_contents($tpl."/right.tpl");
$main=str_replace('%right%',$right,$main);
$main=str_replace('%tpl%',$tpl,$main);
$main=str_replace('%images%',$images,$main);
$main=str_replace('%mdocs%',$mdocs,$main);
$main=str_replace('%alert%',$alert,$main);
////////////////////////////////////////// coordinates & phones
$f=file_get_contents($coords);
$strs = explode(PHP_EOL,$f);
foreach($strs as $st0){
        $st=explode('#',$st0);
        //print_r ($st);
        $main=str_replace($st[0],$st[1],$main);
}

////////////////////////////////////////// coordinates & phones
unset($p);
$dbn=null;
$dbu=null;
echo $main;
?>