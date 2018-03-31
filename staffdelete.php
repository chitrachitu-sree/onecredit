<?php
include('dpc_conn.php');
if(isset($_POST['delete'])){
	$s_per_id = $_POST['delete'];
	if($s_per_id){
		foreach($s_per_id as $id){
		echo  $query_del = "delete from `staff_details` where staff_id='$id'";
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
 <td>name</td>
 <td>Depatment</td>
 <td>Course</td>
 <td>count</td>
 </tr>
</div>
 </thead>
 <tbody>
<?php

$query = "SELECT sg.staff_id,sd.rollno,sd.staff_name,dp.dep_name,c.course_name,sg.count FROM staffcourse_reg as sg,staff_details as sd,department as dp,courses as c where sd.dep_id=dp.dep_id and sg.course_code=c.course_code and sg.staff_id=sd.staff_id";
$result = mysqli_query($conn,$query);
if(isset($result)){
while($row = mysqli_fetch_array($result)){

	echo " <tr>
			<td><input type='submit' name='delete[]' value='".$row['staff_id']."'></td>
      <td>".$row['rollno']."</td>
      <td>".$row['staff_name']."</td>
			<td>".$row['dep_name']."</td>
			<td>".$row['course_name']."</td>
			<td>".$row['count']."</td>
		   </tr>";
  }
}
?>
</tbody>
 </table></br>
 </form>
	</body>
</html>
