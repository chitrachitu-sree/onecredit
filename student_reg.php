<?php
include("dpc_conn.php");
$fail=null;
$success=null;
$count=20;
if(isset($_POST['submit'])){

	$rollno = $_POST['rollno'];
  $dep = $_POST['dep'];
  $course=$_POST['course'];
	if($count<=20)
	{
   $query_insert= "insert into student_reg (`rollno`,`dep_id`,`course_code`) values('$rollno','$dep','$course')";
	$result_insert = mysqli_query($conn,$query_insert);
	$count=$count-1;
}

	if(!$result_insert){
	$fail= "Failed";
	}
  else {
    $success="success";
    }

  }




$query_dep = "SELECT * FROM department";
$result = mysqli_query($conn,$query_dep);

$query_course = "SELECT * FROM courses";
$result_course = mysqli_query($conn,$query_course);
?>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body><br/>
<div class="page-header text-center">
  <h1>KONGU ENGINEERING COLLEGE</h1><br><hr/>
	<a role="button" class="btn btn-primary" style="float-right" href="login.php">LOGIN</a>
  </div>


   <div class="container">
    <div class="row justify-content-md-center" align='center'>
     <div class="col-5">
<?php if(isset($fail)){
if($success==null){
 ?>
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <?php echo $fail; ?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
<?php
 }
}
else {
 if($success!=null){
 ?>
 <div class="alert alert-success alert-dismissible fade show" role="alert">
   <?php echo $success; ?>
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
<?php
 }
} ?>

    <form align="center" method="post">
         <h3 >STUDENT COURSE REGISTERTATION</h3>
     <label class=" col-form-label"><b>Student Rollno:</b></label>
     <select name="rollno" class="form-control">
       <option value="" >Select rollno</option>
			 <?php
		 $query_user = "SELECT * FROM login where role='student' and username not in(select rollno from student_reg where rollno)";
	   $result_user = mysqli_query($conn,$query_user);
			 while($row = mysqli_fetch_array($result_user)){

				 echo "<option value='".$row["username"]."'>".$row['username']."</option>\n";
					 }
		?>

     </select><br><br>


        <label class=" col-form-label"><b>Department:</b></label>
          <select name="dep" class="form-control">
            <option value="" >Select Department</option>
          <?php
          while($row = mysqli_fetch_array($result)){

            echo "<option value='".$row["dep_id"]."'>".$row['dep_name']."</option>\n";
          }
          ?>
          </select><br><br>

          <label class=" col-form-label"><b>Course name:</b></label>
            <select name="course" class="form-control">
              <option value="" >Select Course</option>
            <?php
            while($row = mysqli_fetch_array($result_course)){

              echo "<option value='".$row["course_code"]."'>".$row['course_name']."</option>\n";
            }
            ?>
            </select><br><br>


       <button type="submit" class="btn btn-default" name="submit">Submit</button><br><br>
  </form>
     </div>
  </div>
 </div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

</html>
