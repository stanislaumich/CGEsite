<?php
require "config.php";
$alert="";


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
if ($_GET['p']=='obr'){
			 $incfile=$tpl.'/grafik.tpl';
			 include 'getfile.php';
		 }
		 
		 
$main=str_replace('%hotline%',$incfile,$main);

$incfile=$tpl.'/plashka.tpl';
include 'getfile.php';
$main=str_replace('%plashka%',$incfile,$main);

$incfile=$tpl.'/podval.tpl';
include 'getfile.php';
$main=str_replace('%podval%',$incfile,$main);
		 		 
$right=file_get_contents($tpl."/right.tpl");
$left=file_get_contents($tpl."/left.tpl");
$main=str_replace('%right%',$right,$main);
$main=str_replace('%left%',$left,$main);
$main=str_replace('%tpl%',$tpl,$main);
$main=str_replace('%usr%',$usr,$main);
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