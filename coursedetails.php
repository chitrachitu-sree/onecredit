<?php
include("dpc_conn.php");

$erruser=$errpass="";
if(isset($_POST['submit'])){
	$code=$_POST['code'];
	$name = $_POST['name'];
	$sem = $_POST['sem'];
  if (empty ($code) && ($name))
  {
     $erruser = "Register Number Invalid";
   }
   else {
			$query_insert = "insert into courses (`course_code`, `course_name`,`semister`) values('$code','$name','$sem')";
			$result_insert = mysqli_query($conn,$query_insert);
					if(!$result_insert){
				echo "Failed";
			     }
  }
}
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

		 <form align="center" method="post">
			    <h3 >COURSE DETAILS</h3>
	    <label class=" col-form-label"><b>course code:</b></label>
	    <input type="text" id="code"class="form-control" placeholder="Enter course code" name="code" required><br><br>

    	<label class=" col-form-label"><b>course Name:</b></label>
      <input type="text" id="name"class="form-control" placeholder="Enter course name" name="name" required><br><br>

    	 <label class=" col-form-label"><b>Semister:</b></label>
       <input type="text" id="sem" class="form-control" placeholder="Enter Semister" name="sem" required><br><br>

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
