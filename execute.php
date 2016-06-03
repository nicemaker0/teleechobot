
<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);

$nicemakerBOT = file_get_contents("http://nicemaker.esy.es/line.php?TG=1&chatID=" . $chatId . "&text=" . $text);
$text=$nicemakerBOT . "lalala";
header("Content-Type: application/json");
for($i=0;$i<3;$i++)
{

$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
}
/*

$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}
/*
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
//$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$talkingId = $message['from']['id'];//誰講話的ID
$chatId =  $message['chat']['id'];//丟回對話的地方

$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
*/
//$content2=file_get_contents("http://milkydad.ass.tw/nothing.php");
//////////////////////////////////////////////////////////////////
//$text = isset($message['text']) ? $content2 : "";
/*
$nicemakerBOT = file_get_contents("http://nicemaker.esy.es/line.php?send=" . $content . "&TG=1");

$message = explode("║",$nicemakerBOT);

//sendMessage($header, $from, $nicemakerBOT);
//sendMessage($header, $from, $message[1]);

for($i=0;$i<$message[0];$i=$i+2){
//	$temp= explode("║",$massage[$i]);
//	$sendto=$temp[0];
//	$sendtext=$temp[1];
//sendMessage($header, $message[$i+1], $message[$i+2]);

header("Content-Type: application/json");
$parameters = array('chat_id' => $message[$i+1], "text" => $message[$i+2]);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
  
} 
/*
$text = $firstname."你好\n" . $content ."\ntalkingID：" . $talkingId . "\nChatID=" . $chatId;

$text = trim($text);
$text = strtolower($text);
*/

