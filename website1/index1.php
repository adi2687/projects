<?php
$password="heyy";
$length=[
   'cost'=> 4];
$password_hash=password_hash($password, PASSWORD_BCRYPT,$length);
$passwordlogin="heyy";
if(password_verify($passwordlogin,$password_hash)){
    echo "theey are the same";
}
else{
    echo "they are not the same man";
}