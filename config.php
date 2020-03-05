<?php
$base='users';
$srv=$_SERVER['SERVER_NAME'];
$usr=$base.'/'.$srv;


$tpl=$usr.'/tpl';
$news=$usr.'/tpl/news';
$usruploaddir='../../'.$news.'/files';
$usruploaddirp='http://'.$srv.'/'.$news.'/files';

$images=$usr.'/images';
$mdocs=$usr.'/mdocs';
$coords=$usr.'/coordinates.txt';
///////////////////////////////////////////////////////
$nbasename=$usr.'/news.sqlite';
$ubasename=$usr.'/users.sqlite';
$basemysql='byhovcge_users';
$mysqlusr='byhovcge_adm';
$mysqlpas='CrazyDog';
$usrmysqltable='byhovusr';
///////////////////////////////////////////////////////
$news_on_page=60;


?>