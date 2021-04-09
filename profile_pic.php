<?php

include('config.php');

$image = $_FILES['image']['name'];

$imagePath = 'profile_pic/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];
$email = $_POST['email'];

move_uploaded_file($tmp_name,$imagePath);

$query = "UPDATE user SET profile_image = '$image' WHERE  email='$email'";

$run = mysqli_query($conn,$query) or die(mysqli_connect_error());
  if($run)
  {
    echo "profile image uploaded successfully";
               
    }
  else{
      echo "profile image not uploaded successfully";
  }


?>