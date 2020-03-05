
<html><head><meta charset="utf-8" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<link rel="shortcut icon" href="%images%/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/bvi.min.css" type="text/css" />
<link rel="stylesheet" href="css/bvi-font.min.css" type="text/css" />
<link href="css.php?f=index" rel="stylesheet" />

<link href="css.php?f=a" rel="stylesheet" />
<link href="css.php?f=div" rel="stylesheet" />
<link href="css.php?f=img" rel="stylesheet" />

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="js/responsivevoice.min.js"></script>
<script src="js/js.cookie.js"></script>
<script src="js/bvi-init.js"></script>
<script src="js/bvi.min.js"></script>
<script src="js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script><link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css" /><script type="text/javascript" charset="UTF-8" src="https://translate.googleapis.com/translate_static/js/element/main_ru.js"></script>
<script type="text/javascript" src="js/flexslider.load.js?pxmdc7"></script><script type="text/javascript" charset="UTF-8" src="https://translate.googleapis.com/element/TE_20190916_00/e/js/element/element_main.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('<style>'+
        '.scrollTop{ display:none; z-index:9999; position:fixed;'+
            'bottom:20px; left:90%; width:88px; height:125px;'+
            'background:url(images/arrowup.png) 0 0 no-repeat; }' +
        '.scrollTop:hover{ background-position:0 -133px;}'
    +'</style>').appendTo('body');
    var
    speed = 550,
    $scrollTop = $('<a href="#" class="scrollTop">').appendTo('body');		
    $scrollTop.click(function(e){
        e.preventDefault();
        $( 'html:not(:animated),body:not(:animated)' ).animate({ scrollTop: 0}, speed );
    });

    //появление
    function show_scrollTop(){
        ( $(window).scrollTop() > 330 ) ? $scrollTop.fadeIn(700) : $scrollTop.fadeOut(700);
    }
    $(window).scroll( function(){ show_scrollTop(); } );
    show_scrollTop();
});
</script>
<script type="text/javascript">/*<![CDATA[*/
    /* <![CDATA[ */
    var bvi = {"BviPanel":"1","BviPanelBg":"white","BviPanelFontSize":"18","BviPanelLetterSpacing":"normal","BviPanelLineHeight":"normal","BviPanelImg":"1","BviPanelImgXY":"1","BviPanelReload":"0","BviPanelNoWork":"0","BviPanelText":"\u0412\u0435\u0440\u0441\u0438\u044f \u0434\u043b\u044f \u0441\u043b\u0430\u0431\u043e\u0432\u0438\u0434\u044f\u0449\u0438\u0445","BviPanelCloseText":"\u041e\u0431\u044b\u0447\u043d\u0430\u044f \u0432\u0435\u0440\u0441\u0438\u044f \u0441\u0430\u0439\u0442\u0430","BviFixPanel":"1","ver":"Button visually impaired version 1.0.3","BviCloseClassAndId":"","BviTextBg":"#e53935","BviTextColor":"#ffffff","BviSizeText":"14","BviSizeIcon":"30","BviPlay":"1"};
    /* ]]> */
/*]]>*/</script>

<title>
</title>
</head>

<body style="visibility: visible;"><!--  class="page page_fix" background="%images%/bg.png"-->
<a href="#" class="bvi-open" title="Версия сайта для слабовидящих"><font align="right">Версия сайта для слабовидящих</font></a><br />

<center>

<div class="image">
	<img src="%images%/logoByhov.jpg" class="radtop" />
</div>

<table border="0" width="1200px">
<tbody><tr>
<td colspan="3">
%plashka%
</td>
</tr>

<tr>
<td colspan="3">
 %alert%
</td>
</tr>

<tr>
<td valign="top">
%left%
</td>
<td width="85%" valign="top">

<div class="main">
%main%
</div>

</td>
<td valign="top">
%right%
</td>
</tr>

<tr>
<td colspan="3">
 <hr>
</td>
</tr>
</tbody>
</table>
    
</center>

<div class="language">
        <img src="images/lang/lang__ru.png" alt="ru" data-google-lang="ru" class="language__img" />
        <img src="images/lang/lang__en.png" alt="en" data-google-lang="en" class="language__img" />
		<img src="images/lang/lang__by.png" alt="by" data-google-lang="be" class="language__img" />
        <img src="images/lang/lang__de.png" alt="de" data-google-lang="de" class="language__img" />
        <img src="images/lang/lang__fr.png" alt="fr" data-google-lang="fr" class="language__img" />
        <!--<img src="images/lang/lang__pt.png" alt="pt" data-google-lang="pt" class="language__img">
        <img src="images/lang/lang__es.png" alt="es" data-google-lang="es" class="language__img">
        <img src="images/lang/lang__it.png" alt="it" data-google-lang="it" class="language__img">
        <img src="images/lang/lang__zh.png" alt="zh" data-google-lang="zh-CN" class="language__img">
        <img src="images/lang/lang__ar.png" alt="ar" data-google-lang="ar" class="language__img">
        <img src="images/lang/lang__nl.png" alt="nl" data-google-lang="nl" class="language__img">
        <img src="images/lang/lang__sv.png" alt="sv" data-google-lang="sv" class="language__img">-->
</div>
	
	
	
	
<!--       footer  -->
 %podval%
</body></html>