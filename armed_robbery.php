<?php

include('config.php');

$image = $_FILES['image']['name'];
$name = $_POST['name'];


$itemstolen = $_POST['itemstolen'];
$description = $_POST['description'];
$location = $_POST['location'];
$datetime = $_POST['date'];
$time = $_POST['time'];


$imagePath = 'img/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name,$imagePath);

$query = "INSERT INTO rape(itemstolen, description,location,image,date,time) 
VALUES ( '$itemstolen','$description','$location','$image','$date','$time' )";
$run = mysqli_query($conn,$query) or die(mysqli_connect_error());
           if($run){
              echo "post succesfully";
               
            }
            else{
            echo "post not submitted";
            }
   if($image == null){
      "INSERT INTO rape(image) VALUES('$null')";

   }         


?>