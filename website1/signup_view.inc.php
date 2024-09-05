<?php 
declare(strict_types= 1);

function checksignuperrors(){
    if(isset($_SESSION['errors_signup'])){
        $errors=$_SESSION['errors_signup'];
        echo"<br>";
        foreach($errors as $error){
            echo $error."<br>";
        }
        unset($_SESSION['errors_signup']);
    }
}