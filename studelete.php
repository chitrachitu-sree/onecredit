<?php
include('dpc_conn.php');
if(isset($_POST['delete'])){
	$s_per_id = $_POST['delete'];
	if($s_per_id){
		foreach($s_per_id as $id){
		 $query_del = "delete from `student_reg` where stud_id='$id'";
		$result_del = mysqli_query($conn,$query_del);

	 }
  }
}
?>
<html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron text-center">
  <h1>KONGU ENGINEERING COLLEGE</h1><br>

  <a role="button" class="btn btn-primary" style="float-right" href="login.php">LOGOUT</a>
  </div>
<form method='post' align="center">
<h1>STAFF DETAILS DELETE</h1>
<div class="container">
<table class="table table-hover table-bordered" align="center">
 <thead>
 <tr>
   <td>id</td>
 <td>rollno</td>
 <td>Depatment</td>
 <td>Course</td>
 </tr>
</div>
 </thead>
 <tbody>
<?php

  $query = "SELECT sd.stud_id,sd.rollno,dp.dep_name,cs.course_name FROM student_reg as sd,department as dp,courses as cs where sd.dep_id=dp.dep_id and sd.course_code=cs.course_code";
$result = mysqli_query($conn,$query);
if(isset($result)){
while($row = mysqli_fetch_array($result)){

	echo " <tr>
			<td><input type='submit' name='delete[]' value='".$row['stud_id']."'></td>
      <td>".$row['rollno']."</td>
			<td>".$row['dep_name']."</td>
      <td>".$row['course_name']."</td>
		   </tr>";
  }
}
?>
</tbody>
 </table></br>
 </form>
	</body>
</html>
