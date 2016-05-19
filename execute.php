<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
//$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$talkingId = $message['from']['id'];
$chatId =  $message['chat']['id'];

$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";

//$content2=file_get_contents("http://milkydad.ass.tw/nothing.php");

//$text = isset($message['text']) ? $content2 : "";
$text = $firstname."你好\n" . $content ."\ntalkingID：" . $talkingId;

$text = trim($text);
$text = strtolower($text);

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $text);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
