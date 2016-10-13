<?php 
define('BOT_TOKEN', '279995367:AAEIFAatCllDb9Hkcd_OF087vL4dBdb1Wy8');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

function checkJSON($chatIDs,$updates){
	$myFile = "log2.txt";
	$updateArray = print_r($updates,TRUE);
	$fh = fopen($myFile, 'a') or die("can't open file");
	fwrite($fh, $chatIDs ."\n\n");
	fwrite($fh, $updateArray."\n\n update array");
	fclose($fh);
	}

// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];

//log
checkJSON($chatID,$update);

// compose reply
$reply =  "El chat id es ".$chatID;
		
// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);
