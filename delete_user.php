<html lang="en">
<?php include('template/header.php'); ?>
<?php
  $server = "localhost";
  $username = "root";
  $password = "" ;
  $dbname = "testing" ;
  global $conn;


//header('content-type:application/json');
  
  $conn = mysqli_connect($server,$username,$password,$dbname) ;

if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}

if (isset($_POST['submit'])){
    if(!empty($_POST['email'])) {

         $email = $_POST['email'];
         
         $query = "DELETE FROM  user WHERE email = '$email'";
         $run = mysqli_query($conn, $query) or die(mysqli_connect_error());
         if($run){
              echo "User deleted succesfully";
       }
        else{
           echo "User delete not successful";
        }
        echo json_encode($run);
    }
    else{
        echo "all fields required";
    }
   
}

?>

<section class="container grey-text">
   <h4 class="center">Enter your details</h4>
   <form class="white" action="delete_user.php" method="POST">
      <label for="">Email</label>
      <input type="email" name="email">
      
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
   </form>
</section>
<?php include('template/footer.php'); ?>
</html>