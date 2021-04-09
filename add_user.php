<?php
$server = "localhost";
$username = "root";
$password = "" ;
$dbname = "testing" ;
global $conn;

$conn = mysqli_connect($server,$username,$password,$dbname);
if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}

$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$email = $obj['email'];
 

$val = isset($_POST['surname']) && isset($_POST['firstname']) && isset($_POST['phonenumber'])
&& isset($_POST['email'])  && isset($_POST['area']) && isset($_POST['landmark'])
&& isset($_POST['password']) && isset($_POST['cpassword']);


 if ($val){
         $surname = $_POST['surname'];
         $firstname = $_POST['firstname'];
         $phonenumber = $_POST['phonenumber'];
         $email = $_POST['email'];
         $area = $_POST['area'];
         $landmark = $_POST['landmark'];
         $password = $_POST['password'];
         $cpassword = $_POST['cpassword'];
         $query = "insert into user(surname,firstname,phonenumber,email,area,landmark,password,cpassword) values('$surname','$firstname','$phonenumber','$email','$area','$landmark','$password','$cpassword')";
        //  $query1 = "INSERT INTO stutea(studentno, firstname,phonenumber,class, surname,teacherfullname) 
        //  SELECT details.studentno, details.firstname, details.phonenumber, details.class, form.surname, CONCAT(form.firstname, \" \", form.phonenumber) AS `teacherfullname` FROM details,form WHERE details.class=form.area";
         
          $CheckSQL = "SELECT * FROM user WHERE email='$email'";
          $check = mysqli_fetch_array(mysqli_query($conn,$CheckSQL));
          if(isset($check)){
 
            $emailExist = 'Email Already Exist, Please Try Again With New Email Address..!';
            
            // Converting the message into JSON format.
           $existEmailJSON = json_encode($emailExist);
            
           // Echo the message on Screen.
            echo $emailExist ; 
        
         }
         else{
            $run = mysqli_query($conn,$query) or die(mysqli_connect_error());
            if($run){
                echo "Form submitted succesfully";
               
            }
            else{
            echo "Form not submitted";
            }
         } 
}
header("Content-Type: application/json")
?>