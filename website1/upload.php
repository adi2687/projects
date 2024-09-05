<?php
if(isset( $_POST['submit'])){
    $file=$_FILES['file'];
    $filename=$_FILES['file']['name'];
    $filetempname=$_FILES['file']['tmp_name'];
    $filesize=$_FILES['file']['size'];
$fileerror=$_FILES['file']['error'];
    $fileExt=explode('.',$filename);
    $fileactualtext=strtolower(end($fileExt));
    $allowed=array( 'jpg','jpeg','png','pdf');

    if(in_array($fileactualtext,$allowed)){
if($fileerror===0){
if($filesize<10000000){
$filenewname=uniqid('',true).'.'.$fileactualtext;
$filedestination='uploads/'.$filenewname;
move_uploaded_file($filetempname,$filedestination);
header("Location: ../website1/index2.php?uploadsuccess");
}
else{
    echo "Your file is too big";
}
}
else{
    echo "There was an error uploading the file";
}
    }
    else{
        echo "You cannot upload this type of matter ";
    }
}