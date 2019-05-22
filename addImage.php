s
<?php

#include "cool.php";

$msg ="";
//if upload image button is pressed
if(isset($_POST["upload"])){
    #path to store the ploaded image
    $target = "images/".basename($_FILES['image']['name']);
    #connect to the database
    include ("cool.php");
#$db = mysqli_connect("127.0.0.1", "root", "", "pjDB");

    #get submited  data from the form
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $sql = "INSERT INTO  images (image, text) VALUES ($image, $text)";
    mysqli_query($db, $sql);#store the submited data

    #moving uploaded image into the folder photos
    if(move_uploaded_file($_FILES['tmp_name']['name'],$target)){
        $msg = "image uploaded succesfully";
    } else{
        $msg = " There was a problem uplading image";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload image</title>
</head>
<body>
    <form /*action="pick.php"*/ method="POST" enctype="multipart/form-data">
    <input type="hidden" name="size" value="100000000">
    <div>
        <input type="file" name="image">
    </div>
    <div>
        <textarea name="text" id="comment" cols="30" rows="10" placeholder="type your complaint here corresponse to the image"></textarea>
    </div>
    <div>
        <input type="submit" name="upload" value="upload image">
    </div>
    </form>
</body>
<style>
#content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
}
form{
    width: 50%;
    margin: 20px auto;
}
form div{
    margin-top: 5px;
}
#img_div{
    width: 80px;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;d                                                                                           
}
#img_div::after{
    content:"";
    display: block;
    clear: both;
}
img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
}
</style>
</html>
