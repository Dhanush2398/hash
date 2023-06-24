<?php
//get data from form  

$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message'];

$to = "yatishg1122@gmail.com";
$subject = "Mail From website";
$txt = "Name = ". $name .  "\r\nEmail = " . $email . "\r\nMessage =" . $message ;
$headers = "From:noreply@yoursite.com" . "\r\n" .
"CC:yatishg1122@gmail.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");
?>
