<?php
define('API_KEY', '1858716290:AAHVhqCm2alGNuFnGAxGuwtx3rZFx23KXVc');
   $db = mysqli_connect("localhost", "texnopos", "YNahz5m612", "texnopos_malbazar") or die('no');
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
$new_user = $message["new_chat_members"];
$left_chat_member = $message["left_chat_member"];
$new_chat_participant = $message["new_chat_participant"];
$left_chat_participant = $message["left_chat_participant"];
$new_user_id = $new_chat_participant["id"];
$left_user_id = $left_chat_participant["id"];
//$new_id = $message->new_chat_members->id;
// $chat_id = $updates["message"]["chat"]["id"];
// $text = $updates["message"]["text"];

$my_chat_member = $updates->my_chat_member;
$status = $updates->my_chat_member->new_chat_member->status;
$group_id = $my_chat_member->chat->id;
$group_name = $my_chat_member->chat->title;

if(isset($my_chat_member)){
    if($status == 'member'){
    $db->query("INSERT INTO `groups` (`id`, `group_id`, `group_name`) VALUES (NULL, '$group_id', '$group_name')");
    }
    else if($status == 'left'){
    $db->query("DELETE FROM `cleaner_groups` WHERE `group_id` = $group_id");
    }
}


if(isset($new_chat_participant)){
  $search = $db->query("SELECT * FROM `adders` WHERE `adder_id` = $id")->fetch_assoc();
  
  if(count($search) > 0){
      $searchid = $db->query("SELECT * FROM `adders` WHERE `adder_id` = $id")->fetch_assoc();
      $searchid = $searchid['id'];
        $insert = $db->query("INSERT INTO `joineds` (`id`, `joined_id`, `adder_id`)
        VALUES (NULL, '$new_user_id', '$searchid')"); 
  }else{
    $insert = $db->query("INSERT INTO `adders` (`id`, `adder_id`) VALUES (NULL, '$id')");
    if($insert == 1){
      $searchid = $db->query("SELECT * FROM `adders` WHERE `adder_id` = $id")->fetch_assoc();
      $searchid = $searchid['id'];
      $insert = $db->query("INSERT INTO `joineds` (`id`, `joined_id`, `adder_id`)
        VALUES (NULL, '$new_user_id', '$searchid')"); 
  }
  }
}



if($text == '/my'){
  $res = $db->query("SELECT * FROM `adders` WHERE `adder_id` = $id")->fetch_assoc();
  $res_id = $res['id']; 
  
  if($res){
    $count = $db->query("SELECT `joined_id` FROM `joineds` WHERE `adder_id` = $res_id");
    $counts =[];
    while($row = $count->fetch_assoc()){
      $counts[] = $row;
    }
    $x = count($counts);
    if($x == 0){
      bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "Siz heshkimdi qospagansiz",
    ]);
    }else{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "Siz ".$x." adam qostiniz",
    ]);
    }
  }
  
}

if($text == '/start'){
  $db->query("INSERT INTO `clients` (`id`, `tg_id`) VALUES (NULL, '$id')");
	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "asd",
    ]);
}



if(isset($left_chat_participant)){
  $search = $db->query("SELECT * FROM `joineds` WHERE `joined_id` = $left_user_id")->fetch_assoc();
  $searchid = $search['id'];
  if(count($search) > 0){
    $deleted = $db->query("DELETE FROM `joineds` WHERE `joineds`.`id` = $searchid");
}
}
