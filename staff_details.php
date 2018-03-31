<?php
include("dpc_conn.php");
$fail=null;
$success=null;
if(isset($_POST['submit'])){

	$rollno = $_POST['rollno'];
  $name = $_POST['staffname'];
	$dep = $_POST['dep'];
  $query_rol = "SELECT rollno FROM staff_details where  rollno='$rollno'";
  $result_rol = mysqli_query($conn,$query_rol);
	$res_rol = mysqli_fetch_array($result_rol);
    if(!isset($res_rol['rollno']))
    {
		 $query_insert= "insert into staff_details(`rollno`,`staff_name`,`dep_id`) values('$rollno','$name','$dep')" ;
			$result_insert = mysqli_query($conn,$query_insert);

			if(!$result_insert){
			$fail= "Failed";
			}
		  else {
		    $success="success";
		    }
  }
     else {
	  $fail= "ALREADY AVALIBLE";
		}
}

$query_rollno = "SELECT * FROM login where role='staff'";
$result_rollno = mysqli_query($conn,$query_rollno);


$query_dep = "SELECT * FROM department";
$result = mysqli_query($conn,$query_dep);
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
	 <a role="button" class="btn btn-primary" style="float-right" href="login.php">LOGOUT</a>
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
 			    <h3 >STAFF DETAILS</h3>
 	    <label class=" col-form-label"><b>Staff Rollno:</b></label>
      <select name="rollno" class="form-control">
        <option value="" >Select rollno</option>
      <?php
      while($row = mysqli_fetch_array($result_rollno)){

        echo "<option value='".$row["username"]."'>".$row['username']."</option>\n";
      }
      ?>
      </select><br><br>
     	<label class=" col-form-label"><b>Staff Name:</b></label>
       <input type="text" id="staffname"class="form-control" placeholder="Enter Staff name" name="staffname" required><br><br>

     	 <label class=" col-form-label"><b>Department:</b></label>
         <select name="dep" class="form-control">
           <option value="" >Select Department</option>
         <?php
         while($row = mysqli_fetch_array($result)){

           echo "<option value='".$row["dep_id"]."'>".$row['dep_name']."</option>\n";
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
