<?php
$base='users';
$srv=$_SERVER['SERVER_NAME'];
$usr=$base.'/'.$srv;


$tpl=$usr.'/tpl';
$news=$usr.'/tpl/news';
$faq=$usr.'/tpl/faq';
$images=$usr.'/images';
$mdocs=$usr.'/mdocs';
$coords=$usr.'/coordinates.txt';
///////////////////////////////////////////////////////
$nbasename=$usr.'/news.sqlite';
$fbasename=$usr.'/faq.sqlite';
$ubasename=$usr.'/users.sqlite';

///////////////////////////////////////////////////////
$news_on_page=5;


?>