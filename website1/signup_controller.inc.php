<?php 
declare(strict_types= 1);
function isinputempty(string $username, string $pwd, string $email){
if(empty($username) || empty($pwd) || empty($email)){
    return true;
}
else{
    return false;
}
}


function isemailvalid( string $email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}


function isusernametaken( object $pdo,string $username){
    if(get_username($pdo ,$username)){
        return true;
    }
    else{
        return false;
    }
}

function isemailregistered( object $pdo,string $email){
    if(get_email( $pdo , $email)){
        return true;
    }
    else{
        return false;
    }
}