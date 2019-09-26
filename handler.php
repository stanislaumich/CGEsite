<?php

header('Content-Type: text/html; charset=utf-8');
// подрубаем API
require_once("vendor/autoload.php");

// дебаг
if(true){
	error_reporting(E_ALL & ~(E_NOTICE | E_USER_NOTICE | E_DEPRECATED));
	ini_set('display_errors', 1);
}

// создаем переменную бота
$token = "461381865:AAE-ySus48Ht6n76bSIGvujPFEzNJLUm3GA";
$bot = new \TelegramBot\Api\Client($token,null);
GLOBAL $conn;
GLOBAL $uconn;
$db_name='allmessages.db';
$users='users.db';
try{
 $dbconn = "sqlite:".$db_name;
 $conn = new PDO($dbconn,$user,$pass);
}
catch(PDOException $e) {  
    file_put_contents('dberr',$e->getMessage().PHP_EOL,  FILE_APPEND);
}
try{
 $udbconn = "sqlite:".$users;
 $uconn = new PDO($udbconn,$user,$pass);
}
catch(PDOException $e) {  
    file_put_contents('dberr',$e->getMessage().PHP_EOL,  FILE_APPEND);
}

$q="CREATE TABLE IF NOT EXISTS `TEXT` (id  INTEGER PRIMARY KEY AUTOINCREMENT, chat_id TEXT, chat_title TEXT, from_id  TEXT, username TEXT, firstname TEXT, lastname TEXT, txt TEXT, replytouid TEXT,replytouname TEXT,replytotext TEXT);";
$st = $conn->exec($q); 
$q="CREATE TABLE IF NOT EXISTS `USR` (id  INTEGER PRIMARY KEY AUTOINCREMENT, uid TEXT, username TEXT, firstname TEXT, lastname TEXT, descr TEXT, b1 TEXT, b2 TEXT);";
$st = $uconn->exec($q);
$q="CREATE TABLE IF NOT EXISTS `WORD` (id  INTEGER PRIMARY KEY AUTOINCREMENT, word TEXT, pic TEXT);";
$st = $conn->exec($q); 
/*
if($_GET["bname"] == "Lz42ServerBot"){
	$bot->sendMessage("@COLLOQUIUMSV", "Тест");
}
*/
// если бот еще не зарегистрирован - регистируем
if(!file_exists("registered.trigger")){ 
	/**
	 * файл registered.trigger будет создаваться после регистрации бота. 
	 * если этого файла нет значит бот не зарегистрирован 
	 */
	 
	// URl текущей страницы
	$page_url = "https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$result = $bot->setWebhook($page_url);
	if($result){
		file_put_contents("registered.trigger",time()); // создаем файл дабы прекратить повторные регистрации
	} else die("ошибка регистрации");
}

// Команды бота
// пинг. Тестовая
$bot->command('ping', function ($message) use ($bot) {
	$bot->sendMessage($message->getChat()->getId(), 'pong!');
	//$bot->sendMessage("@COLLOQUIUM-SV", "Тест");
});

// обязательное. Запуск бота
$bot->command('start', function ($message) use ($bot) {
    $answer = 'Добро пожаловать!';
    $bot->sendMessage($message->getChat()->getId(), $answer);
});

// помощ
/*
$bot->command('help', function ($message) use ($bot) {
    $answer = 'Команды:
/help - помощ';
    $bot->sendMessage($message->getChat()->getId(), $answer);
	//$bot->sendMessage('@COLLOQUIUMSV',$answer);
});
*/
$bot->command('add', function ($message) use ($bot) {
	if ($message->getText()){
	$mtext = $message->getText();}
	$a=explode(' ',$mtext);
    $q = "INSERT INTO WORD VALUES (null, '".mb_strtolower($a[1])."', '".$a[2]."')";
    $st = $GLOBALS["conn"]->exec($q);
	$answer = 'Добавлено: '.$a[1] ." с картинкой ". $a[2];
    $bot->sendMessage($message->getChat()->getId(), $answer);

});

$bot->command('del', function ($message) use ($bot) {
	if ($message->getText()){
	$mtext = $message->getText();}
	$a=explode(' ',$mtext);
	$e=mb_strtolower($a[1]);
    $q = "delete from WORD where word = '".$a[1]."'";
    $st = $GLOBALS["conn"]->exec($q);
	$answer = 'Добавлено: '.$a[1] ." с картинкой ". $a[2];
    $bot->sendMessage($message->getChat()->getId(), $answer);

});

$bot->command('bal', function ($message) use ($bot) {
	$k="TPLx9PqxNAN8bGHMz6fNmYAMZ2fNi3VM2k";
	$r=$message->getText();
	$t=str_replace("/bal","",$r);
	if($t){
	$k=$t;	
	}
	/*
	{"currency": "TLR", 
	"unsold": 0.17553493113797, 
	"balance": 1.49160628, 
	"unpaid": 1.66714121, 
	"paid24h": 0.00000000, 
	"total": 1.66714121, 
	"miners": [{"version": "cpuminer-opt\/3.7.10", 
				"password": "c=TLRH", 
				"ID": "", 
				"algo": "lyra2z", 
				"difficulty": 0.186, 
				"subscribe": 1, 
				"accepted": 76097.64, 
				"rejected": 0}, 
			   {"version": "cpuminer-opt\/3.7.10", 
			    "password": "c=TLRW", 
			    "ID": "", 
			    "algo": "lyra2z", 
			    "difficulty": 0.152, 
			    "subscribe": 1, 
			    "accepted": 88778.087, 
			    "rejected": 0}]}
	*/
	$e=$PHP_EOL."\n";
	//$answer=$t;
    $answer = file_get_contents('http://taler-pool.online/api/walletEx?address='.$k);
    $mes=json_decode($answer);
	$answer=$r.$e."BALANCE: ".$mes->{'balance'}.$e;
	$answer.="UNPAID : ".$mes->{'unpaid'}.$e;
	$miners=$mes->{'miners'};
	foreach($miners as $m){
	$answer.="M: ".$m->{'password'}.", ".$m->{'version'}.$e;
	$answer.="D= ".$m->{'difficulty'};
	$answer.=", A/R= ".$m->{'accepted'}." / ".$m->{'rejected'}.$e;
	//$answer.="Rejected= ".$m->{'rejected'}.$e;
	}
	$bot->sendMessage($message->getChat()->getId(), $answer);
	//$bot->sendMessage('@COLLOQUIUMSV',$answer);
});
$bot->command('bel', function ($message) use ($bot) {
	//$k="TPLx9PqxNAN8bGHMz6fNmYAMZ2fNi3VM2k";
	$k="TTBEbT5eaFc5qf3s3S2dSDVcgs9wo9uxUJ";
	$r=$message->getText();
	$t=str_replace("/bal","",$r);
	if($t){
	$k=$t;	
	}
	/*
	{"currency": "TLR", 
	"unsold": 0.17553493113797, 
	"balance": 1.49160628, 
	"unpaid": 1.66714121, 
	"paid24h": 0.00000000, 
	"total": 1.66714121, 
	"miners": [{"version": "cpuminer-opt\/3.7.10", 
				"password": "c=TLRH", 
				"ID": "", 
				"algo": "lyra2z", 
				"difficulty": 0.186, 
				"subscribe": 1, 
				"accepted": 76097.64, 
				"rejected": 0}, 
			   {"version": "cpuminer-opt\/3.7.10", 
			    "password": "c=TLRW", 
			    "ID": "", 
			    "algo": "lyra2z", 
			    "difficulty": 0.152, 
			    "subscribe": 1, 
			    "accepted": 88778.087, 
			    "rejected": 0}]}
	*/
	$e=$PHP_EOL."\n";
	//$answer=$t;
    $answer = file_get_contents('http://taler-pool.online/api/walletEx?address='.$k);
    $mes=json_decode($answer);
	$answer=$r.$e."BALANCE: ".$mes->{'balance'}.$e;
	$answer.="UNPAID : ".$mes->{'unpaid'}.$e;
	$miners=$mes->{'miners'};
	foreach($miners as $m){
	$answer.="M: ".$m->{'password'}.", ".$m->{'version'}.$e;
	$answer.="D= ".$m->{'difficulty'};
	$answer.=", A/R= ".$m->{'accepted'}." / ".$m->{'rejected'}.$e;
	//$answer.="Rejected= ".$m->{'rejected'}.$e;
	}
	$bot->sendMessage($message->getChat()->getId(), $answer);
	//$bot->sendMessage('@COLLOQUIUMSV',$answer);
});
// передаем картинку
$bot->command('getpic', function ($message) use ($bot) {
	$pic = "http://aftamat4ik.ru/wp-content/uploads/2017/03/photo_2016-12-13_23-21-07.jpg";

    $bot->sendPhoto($message->getChat()->getId(), $pic);
});

// передаем документ
$bot->command('me', function ($message) use ($bot) {
	$document = new \CURLFile('shtirner.txt');
/*
if(mb_stripos($mtext,"/me") !== false){
		//$pic = "http://lz42.ru/serverbot/679.jpg";
		$mtext=substr($mtext,3);
        $bot->sendMessage($message->getChat()->getId(), $mtext);
		//$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	if ($message->getText()){
	$mtext = $message->getText();}
	$a=explode(' ',$mtext);
    $q = "INSERT INTO WORD VALUES (null, '".mb_strtolower($a[1])."', '".$a[2]."')";
    $st = $GLOBALS["conn"]->exec($q);
	$answer = 'Добавлено: '.$a[1] ." с картинкой ". $a[2];
    $bot->sendMessage($message->getChat()->getId(), $answer);
	
	
*/
$mtext = $message->getText();
$u = $message->getfrom();
$mtext=substr($mtext,3);
//$u->getusername()
/*
function editMessageText(
        $chatId,
        $messageId,
        $text,
        $parseMode = null,
        $disablePreview = false,
        $replyMarkup = null
    )
*/
$bot->sendMessage($message->getChat()->getId(), '<b>'.$u->getusername().'</b> '.$mtext,'html');
//$bot->editMessageText($message->getChat()->getId(),$message->GetmessageId() ,$u->getusername().' '.$mtext);

});

// Кнопки у сообщений
/*
$bot->command("ibutton", function ($message) use ($bot) {
	$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
		[
			[
				['callback_data' => 'data_test', 'text' => 'Answer'],
				['callback_data' => 'data_test2', 'text' => 'ОтветЪ']
			]
		]
	);

	$bot->sendMessage($message->getChat()->getId(), "тест", false, null,null,$keyboard);
});
*/
// Обработка кнопок у сообщений
$bot->on(function($update) use ($bot, $callback_loc, $find_command){
	$callback = $update->getCallbackQuery();
	$message = $callback->getMessage();
	$chatId = $message->getChat()->getId();
	$data = $callback->getData();
	
	if($data == "data_test"){
		$bot->answerCallbackQuery( $callback->getId(), "This is Ansver!",true);
	}
	if($data == "data_test2"){
		$bot->sendMessage($chatId, "Это ответ!");
		$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	}

}, function($update){
	$callback = $update->getCallbackQuery();
	if (is_null($callback) || !strlen($callback->getData()))
		return false;
	return true;
});

// обработка инлайнов
$bot->inlineQuery(function ($inlineQuery) use ($bot) {
	mb_internal_encoding("UTF-8");
	$qid = $inlineQuery->getId();
	$text = $inlineQuery->getQuery();
	
	// Это - базовое содержимое сообщения, оно выводится, когда тыкаем на выбранный нами инлайн
	$str = "Что другие?
Свора голодных нищих.
Им все равно...
В этом мире немытом
Душу человеческую
Ухорашивают рублем,
И если преступно здесь быть бандитом,
То не более преступно,
Чем быть королем...
Я слышал, как этот прохвост
Говорил тебе о Гамлете.
Что он в нем смыслит?
<b>Гамлет</b> восстал против лжи,
В которой варился королевский двор.
Но если б теперь он жил,
То был бы бандит и вор.";
	$base = new \TelegramBot\Api\Types\Inline\InputMessageContent\Text($str,"Html");
	
	// Это список инлайнов
	// инлайн для стихотворения
	$msg = new \TelegramBot\Api\Types\Inline\QueryResult\Article("1","С. Есенин","Отрывок из поэмы `Страна негодяев`");
	$msg->setInputMessageContent($base); // указываем, что в ответ к этому сообщению надо показать стихотворение
	
	// инлайн для картинки
	$full = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961.jpg"; // собственно урл на картинку 
	$thumb = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961-150x150.jpg"; // и миниятюра
	
	$photo = new \TelegramBot\Api\Types\Inline\QueryResult\Photo("2",$full,$thumb);
	
	// инлайн для музыки
	$url = "http://aftamat4ik.ru/wp-content/uploads/2017/05/mongol-shuudan_-_kozyr-nash-mandat.mp3";
	$mp3 = new \TelegramBot\Api\Types\Inline\QueryResult\Audio("3",$url,"Монгол Шуудан - Козырь наш Мандат!");
	
	// инлайн для видео
	$vurl = "http://aftamat4ik.ru/wp-content/uploads/2017/05/bb.mp4";
	$thumb = "http://aftamat4ik.ru/wp-content/uploads/2017/05/joker_5-150x150.jpg";
	$video = new \TelegramBot\Api\Types\Inline\QueryResult\Video("4",$vurl,$thumb, "video/mp4","коммунальные службы","тут тоже может быть описание");
	
	// отправка
/*
	try{
		$result = $bot->answerInlineQuery( $qid, [$msg,$photo,$mp3,$video],100,false);
	}catch(Exception $e){
		file_put_contents("rdata",print_r($e,true));
	}
	*/
});

// Reply-Кнопки
/*
$bot->command("buttons", function ($message) use ($bot) {
	$keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([[["text" => "Власть советам!"], ["text" => "Сиськи!"]]], true, true);

	//$bot->sendMessage($message->getChat()->getId(), "тест", false, null,null, $keyboard);
});
*/


// Отлов любых сообщений + обрабтка reply-кнопок
$bot->on(function($Update) use ($bot){
	$ins=TRUE;
	$message = $Update->getMessage();
	if ($message->getText()){
	$mtext = $message->getText();}
	$cid = $message->getChat()->getId();
	$ctt = $message->getChat()->getTitle();
	$u = $message->getfrom();
	/*
	выбираем ответы на сообщения бота
	*/
	$g=$message->getReplyToMessage();
	if ($g){  //$g->getMessageId()
	$ruid=$g->getfrom()->getusername()."(".$g->getfrom()->getfirstname()." ".$g->getfrom()->getlastname().")";
	//$ruid=" Dummi";
	$ttt=$mtext;//." - IS REPLY TO (".$ruid.") -> ^".$g->getText()."^";
	$q = "INSERT INTO text VALUES (null, '".$cid."', '".$ctt."', '".$u->getid()."','".$u->getusername()."','".$u->getfirstname()."','".$u->getlastname()."','".$ttt."','".$g->getfrom()->getId()."','".$ruid."','".$g->getText()."')";
    $st = $GLOBALS["conn"]->exec($q);
	$ins=FALSE;// больше не обрабатываем	
	//file_put_contents('1.txt',$ruid.'==');	
	}
	
	
	
	//id  INTEGER PRIMARY KEY AUTOINCREMENT, uid TEXT, username TEXT, firstname TEXT, lastname TEXT, descr TEXT, b1 TEXT, b2 TEXT)
	$q="update usr set username='".$u->getusername()."', firstname='".$u->getfirstname()."', lastname='".$u->getlastname()."' where uid='".$u->getid()."'";
	$st = $GLOBALS["uconn"]->exec($q);
	//file_put_contents('1.txt',$st.'==',FILE_APPEND);
	if (!$st){
	$q="insert into usr values (null,'".$u->getid()."', '".$u->getusername()."', '".$u->getfirstname()."', '".$u->getlastname()."','descr','b1','b2');";
	$st = $GLOBALS["uconn"]->exec($q);
	//file_put_contents('1.txt',$st.'++',FILE_APPEND);
	}
	
	/*
	
	*/
	
	
	/*
	if ($message->getleftchatmember()){
		$mtext = $message->getleftchatmember()->getusername()." (".$message->getleftchatmember()->getfirstname()." ".$message->getleftchatmember()->getlastname().") покинул нас";
		
	}
	if ($message->getnewchatmember()){
		$mtext = $message->getnewchatmember()->getusername()." (".$message->getnewchatmember()->getfirstname()." ".$message->getnewchatmember()->getlastname().") присоединился к нам";
		
	}
	*/
	/*
	$usr = '('.$u->getfirstname().''.$u->getlastname().')'.$u->getusername().'> ';
	file_put_contents('lisa.txt',$usr.' '.$mtext.'<br>'.PHP_EOL,  FILE_APPEND);
	if (file_exists('s.txt')){	$q=file_get_contents('s.txt');}
	else{$q=='';}
	if ($q!=''){
	$bot->sendMessage($message->getChat()->getId(), 'Сайт: '.$q);
	unlink('s.txt');}
	*/
	if($ins){
	$q = "INSERT INTO text VALUES (null, '".$cid."', '".$ctt."', '".$u->getid()."','".$u->getusername()."','".$u->getfirstname()."','".$u->getlastname()."','".$mtext."','','','')";
    $st = $GLOBALS["conn"]->exec($q);
	}
	
	if(mb_stripos($mtext,"ножки") !== false){
		$pic = "http://lz42.ru/serverbot/04.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Ножки есть нижние лапки!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}	
	if(mb_stripos($mtext,"сиськи") !== false){
		$pic = "http://lz42.ru/serverbot/02.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Сиськи: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
		if(mb_stripos($mtext,"молочные железы") !== false){
		$pic = "http://lz42.ru/serverbot/03.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Желез мало не бывает: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	if(mb_stripos($mtext,"настусик") !== false){
		//$pic = "http://aftamat4ik.ru/wp-content/uploads/2017/05/14277366494961.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Чо прицепился то, тута я, тута');
		//$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	if(mb_stripos($mtext,"лапками") !== false){
		$pic = "http://lz42.ru/serverbot/07.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Лапка-котяпка ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	if(mb_stripos($mtext,"языком") !== false){
		$pic = "http://lz42.ru/serverbot/08.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Лизык в студию!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	if(mb_stripos($mtext,"приготовить") !== false){
		$pic = "http://lz42.ru/serverbot/09.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Приготовление!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}	
	if(mb_stripos($mtext,"платьишко") !== false){
		$pic = "http://lz42.ru/serverbot/10.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Платье!!!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
		if(mb_stripos($mtext,"сканер") !== false){
		$pic = "http://lz42.ru/serverbot/11.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Сканер!!!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
			if(mb_stripos($mtext,"сосцы") !== false){
		$pic = "http://lz42.ru/serverbot/12.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Сосцы!!!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	if(mb_stripos($mtext,"много сисек") !== false){
		$pic = "http://lz42.ru/serverbot/101.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Их никогда много не бывает!!!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
if(mb_stripos($mtext,"держатель") !== false){   
$pic = "http://lz42.ru/serverbot/24.jpg"; 
$bot->sendMessage($message->getChat()->getId(), 'Но только такой!: '); 
  $bot->sendPhoto($message->getChat()->getId(), $pic);
}
if(mb_stripos($mtext,"ужинать") !== false){   
$pic = "http://lz42.ru/serverbot/70.jpg"; 
$bot->sendMessage($message->getChat()->getId(), 'С сексуальным парнем!: ');   
$bot->sendPhoto($message->getChat()->getId(), $pic);}

/*if(mb_stripos($mtext,"спать") !== false){   $pic = "http://lz42.ru/serverbot/71.jpg";
$bot->sendMessage($message->getChat()->getId(), 'Зевок!: ');  
 $bot->sendPhoto($message->getChat()->getId(), $pic);}

	if(mb_stripos($mtext,"мужик") !== false){
		$pic = "http://lz42.ru/serverbot/22.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Мужичок с ноготок: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}*/
		if(mb_stripos($mtext,"сессия") !== false){
		$pic = "http://lz42.ru/serverbot/679.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Расписание зимней сессии: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
			if(mb_stripos($mtext,"методичк") !== false){
		$document = new \CURLFile('3k1s.zip');
        $bot->sendMessage($message->getChat()->getId(), 'Методички ');
		//$bot->sendPhoto($message->getChat()->getId(), $pic);
		
		//$document = new \CURLFile('shtirner.txt');
	
    $bot->sendDocument($message->getChat()->getId(), $document);
	}
	/*
	if($mtext=="платьишко") {
		$pic = "http://lz42.ru/serverbot/10.jpg";
        $bot->sendMessage($message->getChat()->getId(), 'Платье!!!: ');
		$bot->sendPhoto($message->getChat()->getId(), $pic);
	}
	*/
}, function($message) use ($name){
	return true; // когда тут true - команда проходит
	
	
});

// запускаем обработку
$bot->run();

echo "бот";
?>