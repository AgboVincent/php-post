<html lang="en">

<?php include('template/header.php'); ?>

<?php
$server = "localhost";
$username = "root";
$password = "" ;
$dbname = "testing" ;
global $conn;


$conn = mysqli_connect($server,$username,$password,$dbname) ;
if (isset($_POST['submit'])){
  if(!empty($_POST['studentno']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])
  && !empty($_POST['class'])){

       $studentno = $_POST['studentno'];
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $class = $_POST['class'];
  
       $query = "insert into details(studentno,firstname,lastname,class) values('$studentno','$firstname','$lastname','$class')";
       $query1 = "INSERT INTO stutea(studentno, firstname,lastname,class, staffno,teacherfullname) 
         SELECT details.studentno, details.firstname, details.lastname, details.class, form.staffno, CONCAT(form.firstname, \" \", form.lastname) AS `teacherfullname` FROM details,form WHERE details.class=form.classheld";

       $run = mysqli_query($conn,$query) or die(mysqli_connect_error());
       //$sql = "SELECT details.studentno, details.firstname, details.lastname, details.class, form.staffno, CONCAT(form.firstname, \" \", form.lastname) AS `teacherfullname` FROM details,form WHERE details.class=form.classheld";
       $run = mysqli_query($conn,$query1) or die(mysqli_connect_error());
        
        if($run){
           echo "Form submitted succesfully";
       }
       else{
       echo "Form not submitted";
       }
  }
  else{
      echo "all fields required";
  }
}

?>

<section class="container grey-text">
   <h4 class="center">Enter your details</h4>
   <form class="white" action="add_student.php" method="POST">
      <label for="">Student No.</label>
      <input type="text" name="studentno">
      <label for="">First Name</label>
      <input type="text" name="firstname">
      <label for="">Last Name</label>
      <input type="text" name="lastname">
        <label for="">Class</label>
      <input type="text" name="class">
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
  
   </form>
</section>
<?php include('template/footer.php'); ?>

</html>
