
<?php
$server = "localhost";
$username = "root";
$password = "" ;
$dbname = "testing" ;
global $conn;


$conn = mysqli_connect($server,$username,$password,$dbname) ;


$sql = "SELECT * FROM user" ;

$array = array();

$result = mysqli_query($conn,$sql);

$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_output = json_encode($array);

 print_r($json_output);

?>