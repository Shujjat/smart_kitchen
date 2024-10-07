<?php 
$secret_key = 'BigFan2WallOfBricks';
$from = '03234532952';

$msg = "Your message has been received";
 
$reply[0] = array("to" => $from, "message" => $msg);
 
echo json_encode(array("payload"=>array(
    "success"=>$success,
    "secret"=>$secret_key,
    "task"=>"send",
    "messages"=>array_values($reply))));
?>