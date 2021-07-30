<?php
$token = "1803830259:AAH6v7hZ0XPX1w8Jp05OAW9F3ZQn4SLpt5Q";
define("token", $token); //bot token
//https://api.telegram.org/bot1803830259:AAH6v7hZ0XPX1w8Jp05OAW9F3ZQn4SLpt5Q/setWebhook?url=https://students.texnopos.uz/nurlan/bot.php
function bot($method, $data = [])
{
    $url = "https://api.telegram.org/bot" . token . "/" . $method;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $res = curl_exec($ch);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;

$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$from_id = $message->from->id;
$message_id = $message->message_id;
bot('sendMessage', [
    'chat_id' => 926111045,
    'text' => "Titl"s,
]);
