<?php 
define('BOT_TOKEN', '279995367:AAEIFAatCllDb9Hkcd_OF087vL4dBdb1Wy8');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

function checkJSON($chatID,$update){
	$myFile = "log.txt";
	$updateArray = print_r($update,TRUE);
	$fh = fopen($myFile, 'a') or die("can't open file");
	fwrite($fh, $chatID ."\n\n");
	fwrite($fh, $updateArray."\n\n");
	fclose($fh);
	}

function sendMessage(){
	$message = "I am a baby bot.";
	return $message;
	}

// read incoming info and grab the chatID
$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatID = $update["message"]["chat"]["id"];
		
// compose reply
$reply =  sendMessage();
		
// send reply
$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
file_get_contents($sendto);
checkJSON($chatID,$update);

