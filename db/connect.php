<?php 
header("Access-Control-Allow-Orgin: *");
header("Content-Type:Application/json");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$firstName = $request->firstName; 
$lastName = $request->lastName;
$email = $request->email;
$message = $request->message;

$name = $firstName." ".$lastName;

$to = "mg6783256@gmail.com";
$email_subject = "Message from website:".$name;
$email_body = "this is body mail" . "<br>" . "name of person:" .$name;
$headers = "From: mg6783256@gmail.com";

//mail($to,$email_subject,$email_body,$headers);

if(mail($to,$email_subject,$email_body,$headers)){
    echo json_encode("success");
}else{
    echo json_encode("failure");
}


?>