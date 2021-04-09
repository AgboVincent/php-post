<?php
include('config.php');

$sql = "SELECT * FROM rape" ;

$array = array();

$result = mysqli_query($conn,$sql);

$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_output = json_encode($array);

 print_r($json_output);

?>