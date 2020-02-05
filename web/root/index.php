<?php
header('Content-Type: text/html; charset=utf-8'); 


define('DEBUG', true);
if ( DEBUG ) {
	$time = microtime();
	ini_set('upload_max_filesize', '50M');
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$begintime = $time;
}
?>
<?
@session_start();
require('../setup/configure.inc.php');

 
$GLOBALS['db']->debug = FALSE;
$core = new Core();
 if ($_POST['send_m']){
    if ($core->isValidEmail($_POST['mail_send'])){ 
     $in = $GLOBALS['db']->GetOne("SELECT mail FROM send_mail WHERE mail = '{$_POST['mail_send']}'");   
        
     $GLOBALS['db']->Execute("INSERT INTO send_mail (mail) VALUES ('{$_POST['mail_send']}')"); 
     if ($in){
       $core->message("Този E-mail вече добавен", MSG_ERROR);  
     }   else {
     $core->message("Вашия E-mail е добавен успешно", "MSG_SUCCESS");
     }
    } else {
     $core->message("Невалиден E-mail", MSG_ERROR);
    } 
}


//CATEGORIES
   $sub_cat = $GLOBALS['db']->GetAll("SELECT id, name, path FROM categories WHERE top = '1' AND id != '107' ");


//WEATHER              
   $rssSofia = simplexml_load_file("http://sinoptik.bg/genrss.php?lid=100727011");
   foreach ($rssSofia->xpath('//item[1]') AS $itemS) { 
       $itemS['description'] = $itemS->description[0];
   }
   $itemS = (array)$itemS;
   $itemS['description'] = $itemS['@attributes']['description'];           
   
   $rssPlovdiv = simplexml_load_file("http://sinoptik.bg/genrss.php?lid=100728193");
   foreach ($rssPlovdiv->xpath('//item[1]') AS $itemP) { 
        $itemP['description'] = $itemP->description[0];
   }
   $itemP = (array)$itemP;
   $itemP['description'] = $itemP['@attributes']['description'];
   
    
   $rssVarna = simplexml_load_file("http://sinoptik.bg/genrss.php?lid=100726050");
   foreach ($rssVarna->xpath('//item[1]') AS $itemV) {   
       $itemV['description'] = $itemV->description[0];
   }
   $itemV = (array)$itemV;
   $itemV['description'] = $itemV['@attributes']['description'];
          

//VALUTI

    $money = $GLOBALS['db']->GetAll("SELECT * FROM valuti ORDER BY id ASC");
        
//GALLERY
    $photos = $GLOBALS['db']->GetAll("SELECT * FROM gallery ORDER BY ID DESC LIMIT  0,4");

global $_TEXT;
$body = $core->ParseURL();  
$body->assign('sub_cat', $sub_cat);
$body->assign('itemS', $itemS);
$body->assign('itemP',$itemP);
$body->assign('itemV',$itemV);
$body->assign('valuti',$money);
$body->assign('photosGallery', $photos);
$body->assign('WEBPATH', WEBPATH);
$body->assign('CAT_SEO', CAT_SEO);
$body->assign('NEWS_SEO', NEWS_SEO);
$body->assign('SEARCH_SEO', SEARCH_SEO);
$body->assign('GALL_SEO', GALL_SEO);
$body->assign('IMAGEPATH', IMAGEPATH);
$body->assign('LANG_GLOBAL', $_TEXT['global']);
$body->assign('SITE_NAME', SITE_NAME);
$body->assign('LANG', $_TEXT[$core->controller][$core->method]);
$body->assign('controllerRun', $core->controller);
$body->assign('methodRun', $core->method);
$body->assign('body', $body->fetch($body->templatePath, md5($_SERVER['REQUEST_URI'].$_SESSION['SID'])));
$body->assign('PAGE_TITLE', $core->UpFirsr( isset($body->PageTitle) ? $body->PageTitle : DEFAULT_PAGE_TITLE ));
$body->assign('PAGE_DESCRIPTION', $core->UpFirsr( isset($body->PageDescription) ? $body->PageDescription : DEFAULT_PAGE_DESCRIPTION ));
$body->assign('PAGE_KEYWORDS', ( isset($body->PageDescription) ? $body->PageKeywords : DEFAULT_PAGE_KEYWORDS ));
$body->assign('PAGE_H1', $core->UpFirsr( isset($body->PageH1) ? $body->PageH1 : false ));
$body->assign('PAGE_IMAGE', $body->PageImage);
$body->assign('Message', $core->Message());
$body->assign('cats', $core->GetMainCats());   
if(!isset($body->PageH1)){
$body->assign('valuti', $core->GetMainValuti());
}
$body->assign('time', $core->GetTime());
$body->assign('footer', $core->GetFooter());
$body->assign('datelogo', core::datelogo());

$sub_cat = $GLOBALS['db']->GetOne("SELECT id, name, path FROM categories WHERE top = '1' AND id != '107' AND parent = '{$_POST['$parent_cat']}'");   

$memcache_obj = Core::mc_connect();
$key = "exc_mem";
$value = $memcache_obj->get($key);
if ($value) {
   $v = unserialize($value);
} else {
   $v = $GLOBALS['db']->GetRow("SELECT id, title, logo, publish_date, views FROM news WHERE ex2 = 1");
   $memcache_obj->add($key, serialize($v), false, 600); 
}     

$url = WEBPATH.core::seoname($v[title]).NEWS_SEO.$v[id].'.html';
$body->assign('exclusive_url',$url);

if ( !isset($body->layout) ) $body->layout = 'index';
if ( $core->admin ) $body->display('layout/admin_index.tpl'); 
else $body->display('layout/'.$body->layout.'.tpl');

?>
