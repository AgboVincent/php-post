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
    if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['phonenumber'])
     && !empty($_POST['email'])  && !empty($_POST['area']) && !empty($_POST['landmark'])
     && !empty($_POST['password']) && !empty($_POST['cpassword'])) {

         $surname = $_POST['surname'];
         $firstname = $_POST['firstname'];
         $phonenumber = $_POST['phonenumber'];
         $email = $_POST['email'];
         $area = $_POST['area'];
         $landmark = $_POST['landmark'];
         $password = $_POST['password'];
         $cpassword = $_POST['cpassword'];
         
 
        $query = "UPDATE user SET surname ='$surname', firstname = '$firstname', phonenumber = '$phonenumber',
            email ='$email', area = '$area', landmark = '$landmark', password = '$password', cpassword = 
            '$cpassword' WHERE email='$email' ";
        $run = mysqli_query($conn, $query) or die(mysqli_connect_error());
         if($run){
              echo "User data update succesfully";
       }
        else{
           echo "User update not successful";
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
   <form class="white" action="update_user.php" method="POST">
      <label for="">Surname</label>
      <input type="text" name="surname">
      <label for="">First Name</label>
      <input type="text" name="firstname">
      <label for="">Phone Number</label>
      <input type="text" name="phonenumber">
      <label for="">Email</label>
      <input type="email" name="email">
      <label for="">Area of Residence</label>
      <input type="text" name="area">
      <label for="">Nearest Landmark</label>
      <input type="text" name="landmark">
      <label for="">Password</label>
      <input type="password" name="password">
      <label for="">Comfirm Password</label>
      <input type="password" name="cpassword">
    
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
   </form>
</section>
<?php include('template/footer.php'); ?>
</html>