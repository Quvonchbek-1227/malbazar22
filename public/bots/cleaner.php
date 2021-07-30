<?php

define('API_KEY', '1786216580:AAGn0_EwSv-nFJ_y3J9ap0n7rBj-43cbi5w');
$db = mysqli_connect("localhost", "texnopos", "YNahz5m612", "texnopos_chatmembers") or die('no');

function bot($method, $data=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $res = curl_exec($ch);
}

$updates = json_decode(file_get_contents("php://input"));
$message = $updates->message;
$text = $message->text;
$chat_id = $message->chat->id;
$name = $message->from->first_name;
$id = $message->from->id;
$message_id = $message->message_id;
$new_user = $message->new_chat_members;
$new_chat_participant = $message->new_chat_participant;
$left_chat_participant = $message->left_chat_participant;
$new_chat_members = $message->new_chat_members; 


$my_chat_member = $updates->my_chat_member;
$status = $updates->my_chat_member->new_chat_member->status;
$group_id = $my_chat_member->chat->id;
$group_name = $my_chat_member->chat->title;

if(isset($my_chat_member)){
    if($status == 'member'){
    $db->query("INSERT INTO `cleaner_groups` (`id`, `group_id`, `group_name`) VALUES (NULL, '$group_id', '$group_name')");
    }
    else if($status == 'left'){
    $db->query("DELETE FROM `cleaner_groups` WHERE `group_id` = $group_id");
    }
}


if(isset($new_chat_members)){
	bot('deleteMessage', [
		'chat_id' => $chat_id,
		'message_id' => $message_id
	]);
}
if(isset($left_chat_participant)){
	bot('deleteMessage', [
		'chat_id' => $chat_id,
		'message_id' => $message_id
	]);
}

$manager = "926111045";

if($chat_id != $manager){
if($text == '/start'){
     $db->query("INSERT INTO `cleaner_clients` (`id`, `tg_id`) VALUES (NULL, '$id')");
	bot('sendMessage', [
		'chat_id' => $chat_id,
		'text' => "Assalawma aleykum, $name"
	]);


    bot('sendMessage', [
	'chat_id' => $chat_id,
	'text' => "Men TexnoPOS IT mektebiniń chat toparına qosılǵan yamasa odan shıǵıp ketken paydalanıwshılar haqqındaǵı xabarlardı avtomat túrde óshiriw ushın arnalǵan botıman."
	]);


	bot('sendMessage', [
		'chat_id' => $manager,
		'text' => "ati $name"
	]);


}

else if($chat_id == $manager){
    if(isset($reply_to_message)){
        bot('sendMessage', [
            'chat_id' => $reply_chat_id,
            'text' => $reply_text,
        ]);
   	}
    if($text == '/start'){
        bot('sendMessage', [
            'chat_id' => $manager,
            'text' => "hello manager",
        ]);
    }
}

}







