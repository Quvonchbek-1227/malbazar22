<?php
define('API_KEY', '1803830259:AAH6v7hZ0XPX1w8Jp05OAW9F3ZQn4SLpt5Q');
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
$new_user = $message->new_chat_members;



    if(isset($_GET['send'])){
        
        $images = $_GET['images'];
        $image = strtok($images, ',');
        $id = $_GET['id'];  
        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'толык корыу', "url"=>"https://malbazar.uz/animaldetail/".$id]
                ]
            ]
        ];
        $add = json_encode([
                'inline_keyboard' => [
            [['text'=> "qosiliw", 'url'=>"https://malbazar.uz/addanimal"]]
                ]    
        ]);
        
        $encodedKeyboard = json_encode($keyboard);
      
        $title = $_GET['title'];
        $price = $_GET['price'];
        $category_name = $_GET['category_name'];
        $city_name = $_GET['city_name'];
        bot('sendPhoto', [
       'chat_id'=>-1001167284814,
       'photo'=> "$image",
       'caption'=>"🔹$title \n💰baxasi: $price \n\n #$city_name #$category_name",
       'reply_markup' => $encodedKeyboard
    ]);

  
    
}
$main = json_encode([
    'inline_keyboard' => [
            [['text'=> "Daǵaza beriw", 'url'=>"https://malbazar.uz/addanimal"]]
        ]    
]);
    $db = mysqli_connect("localhost", "texnopos", "YNahz5m612", "texnopos_malbazar") or die('no');
    if($text == '/start'){
        $db->query("INSERT INTO `tg_clients` (`id`, `tg_id`, `first_name`) VALUES (NULL, '$id', '$name')");
	bot('sendMessage', [
        'chat_id' => 926111045,
        'text' => "taza adam $name",
    ]);
  
     bot('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "Daǵaza beriw ushın tómendegi 👇 túymeni basıń",
    'reply_markup'=>$main,
    ]);
    

}	





?>