<?Php

  $server = "localhost";
  $username = "root";
  $password = "" ;
  $dbname = "testing" ;
  global $conn;
  global $email;

$conn = mysqli_connect($server,$username,$password,$dbname) ;
if(!$conn){
    echo 'connection error' . mysqli_connect_error();
}

$val = isset($_POST['email']) && isset($_POST['password']);

if ($val){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginQuery = "SELECT * FROM user WHERE email='$email' and password = '$password'";
    $check = mysqli_fetch_array(mysqli_query($conn,$loginQuery));

    if(isset($check)){
		
        // Successfully Login Message.
        $onLoginSuccess = 'Login Matched';
        
        // Converting the message into JSON format.
        $SuccessMSG = json_encode($onLoginSuccess);
        
        // Echo the message.
       // echo $SuccessMSG ; 
       
        return get_single_user($email);
        echo get_single_user($email);
    }
    
    else{
    
        // If Email and Password did not Matched.
       $InvalidMSG = 'Invalid Username or Password Please Try Again' ;
        
       // Converting the message into JSON format.
       $InvalidMSGJSon = json_encode($InvalidMSG);
        
       // Echo the message.
        echo $InvalidMSGJSon ;
    
    }
}
function get_single_user($email){
    $server = "localhost";
    $username = "root";
    $password = "" ;
    $dbname = "testing" ;
    global $conn;
   
  $conn = mysqli_connect($server,$username,$password,$dbname) ;
  if(!$conn){
      echo 'connection error' . mysqli_connect_error();
  }
    $conn = mysqli_connect($server,$username,$password,$dbname) ;
    $s_user = "SELECT * FROM user WHERE email ='$email'";
    $result = mysqli_query($conn,$s_user);
    $array = array();
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $json_output = json_encode($array);
    print_r($json_output);
    return $json_output;
}
   
?>