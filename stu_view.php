 <?php
include("dpc_conn.php");
?>
<html>
	<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="page-header text-center">
  <h1>KONGU ENGINEERING COLLAGE</h1><br>
  <a role="button" class="btn btn-primary" style="float-right" href="login.php">LOGIN</a>
  </div>

  <form method="post" align="center">
      <h1>ENTER THE ROLLNO</h1>
     Rollno:<input type="text" name="rollno">
     <input type="submit" value="enter" name="go"><br>
   </form>

  <?php
     if(isset($_POST['go'])){
  	   $rollno = $_POST['rollno'];
  	    $query_name = "SELECT sr.rollno,c.course_name,dp.dep_name FROM student_reg as sr,department as dp,courses as c where dp.dep_id=sr.dep_id and sr.course_code=c.course_code ";
           $result_name = mysqli_query($conn,$query_name);

  	   ?>
  <table border="1" align="center">
   <thead>
   <tr>
   <td>rollno</td>
   <td>department</td>
   <td>course</td>
   </tr>
   </thead>
   <tbody>
  <?php

  	if(isset($result_name)){
  		while($row_1 = mysqli_fetch_array($result_name)){

  			echo " <tr>
  					<td>".$row_1['rollno']."</td>
  					<td>".$row_1['dep_name']."</td>
  					<td>".$row_1['course_name']."</td>
  				   </tr>";
  		}
  	}
  	}
  ?>
  </tbody>
   </table></br>

  	</body>
  </html>
