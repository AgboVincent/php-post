<?php

include('config.php');

$image = $_FILES['image']['name'];
$name = $_POST['name'];

$age = $_POST['age'];
$sex = $_POST['sex'];
$description = $_POST['description'];
$location = $_POST['location'];
$datetime = $_POST['date'];
$time = $_POST['time'];
$null = $_POST[''];

$imagePath = 'img/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name,$imagePath);

$query = "INSERT INTO rape(name, age, sex, description,location,image,date,time) 
VALUES ( '$name','$age','$sex','$description','$location','$image','$date','$time' )";
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


function createPost(){
include('config.php');

$val = isset($_POST['name']) && isset($_POST['age']) && isset($_POST['sex'])
&& isset($_POST['description'])  && isset($_POST['location']) && isset($_POST['date_time']);

if ($val){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $descriptin = $_POST['description'];
        $location = $_POST['location'];
        $datetime = $_POST['date_time'];
 
        $query = "insert into rape(victim_name,age,sex,description,location,date_time) values('$name','$age','$sex','$description','$location','$datetime')";
        $run = mysqli_query($conn,$query) or die(mysqli_connect_error());
           if($run){
              echo "post succesfully";
               
            }
            else{
            echo "post not submitted";
            }
    }

header("Content-Type: application/json");


$image = $_FILES['image'];
//$name = $_POST['name'];

$imagePath = 'img/'.$image;
$tmp_name = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp_name,$imagePath);

$query = "INSERT INTO rape(pictures) VALUES ('$image')";
$run = mysqli_query($conn,$query) or die(mysqli_connect_error());
           if($run){
              echo "post succesfully";
               
            }
            else{
            echo "post not submitted";
            }


}


function deletePost(){

}

function editPost(){


}

function readPosts(){

    
}


?>