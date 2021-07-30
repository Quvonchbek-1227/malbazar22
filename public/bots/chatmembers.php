<?php

define('API_KEY', '1747504011:AAGGhN5bErlbLOm8kS_EJJ4jV94p8DW2dMY');
$db = mysqli_connect("localhost", "texnopos", "YNahz5m612", "texnopos_chatmembers") or die('no');

function bot($method, $data=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $res = curl_exec($ch);
}

$updates = file_get_contents('php://input');
$updates = json_decode($updates, TRUE);

$message = $updates['message'];
$text = $message["text"];
$chat_id = $message["chat"]["id"];
$name = $message["from"]["first_name"];
$id = $message["from"]["id"];
$new_chat_members = $message["new_chat_members"];

$new_user_id = $message["new_chat_members"]["id"];

$left_chat_member = $message["left_chat_member"];
$left_chat_participant = $message["left_chat_participant"];
$left_user_id = $left_chat_participant["id"];

$my_chat_member = $updates["my_chat_member"];

$status = $updates["my_chat_member"]["new_chat_member"]["status"];
$group_id = $my_chat_member["chat"]["id"];
$group_name = $my_chat_member["chat"]["title"];

if($text == '/str'){
        bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => json_encode($message),
    ]);
}



if($my_chat_member){
    if($status == 'member'){
    $db->query("INSERT INTO `groups` (`id`, `group_id`, `name`) VALUES (NULL, '$group_id', '$group_name')");
    }
    else if($status == 'left'){
    $db->query("DELETE FROM `groups` WHERE `group_id` = $group_id");
    }
}
$admin = 926111045;
if($new_chat_members){
        foreach($new_chat_members as $key => $value){
        $insert = $db->query("INSERT INTO `chatmembers` (`id`, `user_id`, `group_id`, `new_user_id`) VALUES (NULL, '$id', '$chat_id', '$value[id]')"); 
        }
      
    
}
if($left_chat_participant){
    $adder_id = $db->query("SELECT * FROM `chatmembers` WHERE `new_user_id` = $left_user_id AND `group_id` = $chat_id")->fetch_assoc();
    $adder_id = $adder_id['user_id'];
    $insert = $db->query("INSERT INTO `lefts` (`id`, `user_id`, `group_id`, `left_user_id`) VALUES (NULL, '$adder_id', '$chat_id', '$left_user_id')"); 
    $deleted = $db->query("DELETE FROM `chatmembers` WHERE `new_user_id` = $left_user_id AND `group_id` = $chat_id");
      
}

if($text == '/my'){
    $count = $db->query("SELECT `new_user_id` FROM `chatmembers` WHERE `user_id` = $id AND `group_id` = $chat_id");
    $counts =[];
    while($row = $count->fetch_assoc()){
      $counts[] = $row;
    }
    $count_left = $db->query("SELECT `left_user_id` FROM `lefts` WHERE `user_id` = $id AND `group_id` = $chat_id");
    $counts_left =[];
    while($row2 = $count_left->fetch_assoc()){
      $counts_left[] = $row2;
    }
    $x = count($counts);
    $lefts = count($counts_left);
    $now = $x+$lefts;
    // if($x < 1){
    //   bot('sendMessage', [
    //     'chat_id' => $chat_id,
    //     'text' => "$name \nSiz heshkimdi qospagansiz",
    // ]);
    // }else{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "$name siz -
________________________
➕ Qosqan adamlar: $now
➖ Shıǵıp ketkenler: $lefts
 = Hazirdegisi: $x 
________________________
Bottan paydalanǵanıńiz ushın raxmet! TexnoPOS (https://t.me/texnopos) kanalına aǵza bolıń!",
    ]);
    //}
}

$main = json_encode([
    'inline_keyboard' => [
            [['text'=> "qosiliw", 'url'=>"https://t.me/texnopos"]]
        ]    
]);
$check = json_encode([
    'inline_keyboard' => [
            [['text'=> "tekseriw", 'callback_data' => "tekseriw"]]
        ]    
]);

if($text == '/start'){
  $db->query("INSERT INTO `clients` (`id`, `tg_id`, `first_name`) VALUES (NULL, '$id', '$name')");
	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "asd",
    ]);
    bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "asd",
    'reply_markup'=>$main,
    ]);
     bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "asd",
    'reply_markup'=>$check,
    ]);
    bot('sendMessage', [
        'chat_id' => $admin,
        'text' => "Taza adam $name",
    ]);
}



if($chat_id == $admin){
    if($text == '/mygroups'){
      $gruppa = [];
      $gruppa = $db->query("SELECT * FROM groups");
    while($row3 = $gruppa->fetch_assoc()){
      $gruppa[] = $row3;
    }
    $count_groups = count($gruppa);
        bot('sendMessage', [
        'chat_id' => $admin,
        'text' => $count_groups,
    ]);
}






}





