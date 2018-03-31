<?php
include("dpc_conn.php");

$fail=null;
$success=null;
if(isset($_POST['submit'])){

	$rollno = $_POST['rollno'];
  $course = $_POST['course'];
	$count = $_POST['count'];

  $query_insert= "insert into staffcourse_reg ( `staff_id`,`course_code`, `count`) values('$rollno','$course','$count')" ;
	$result_insert = mysqli_query($conn,$query_insert);

	if(!$result_insert){
	$fail= "Failed";
	}
  else {
    $success="success";
    }
  }

$query_rollno = "SELECT * FROM staff_details";
$result_rollno = mysqli_query($conn,$query_rollno);

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
 			    <h3 >STAFF COURSE REGISTERTATION</h3>
 	    <label class=" col-form-label"><b>Staff Rollno:</b></label>
      <select name="rollno" class="form-control">
        <option value="" >Select rollno</option>
      <?php
      while($row = mysqli_fetch_array($result_rollno)){

        echo "<option value='".$row["staff_id"]."'>".$row['rollno']."</option>\n";
      }
      ?>
      </select><br><br>
      <?php
      $query_course = "SELECT * FROM courses";
      $result_course = mysqli_query($conn,$query_course);
      ?>

     	 <label class=" col-form-label"><b>Course name:</b></label>
         <select name="course" class="form-control">
           <option value="" >Select Course</option>
         <?php
         while($row = mysqli_fetch_array($result_course)){

           echo "<option value='".$row["course_code"]."'>".$row['course_name']."</option>\n";
         }
         ?>
         </select><br><br>

         <label class=" col-form-label"><b>Course Count:</b></label>
          <input type="text" id="count"class="form-control" placeholder="Enter Course Count" name="count" required><br><br>

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
