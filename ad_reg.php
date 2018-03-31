<?php
include("dpc_conn.php");
$erruser=$errpass="";
$fail=null;
$success=null;
if(isset($_POST['submit'])){

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($user))
  {
    $erruser = "Name is required";
  }
  else
  {
    if (!preg_match("/^\d{2}[a-zA-z]{3}\d{3}$/",$user))
	  {
      $erruser = "Register Number Invalid";
     }
   else {
   	{
			$query_insert = "insert into login (`username`, `password`, `role`) values('$user','$pass','$role')";
			$result_insert = mysqli_query($conn,$query_insert);
			if(!$result_insert){
			$fail= "Failed";
			}
			else {
				$success="success";
				}
			}
		}
			}
		}
   }

$query_user = "SELECT * FROM login";
$result_user = mysqli_query($conn,$query_user);

?>
<html>
	<head>
  <title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="jumbotron text-center">
  <h1>KONGU ENGINEERING COLLEGE</h1><br>
  <a role="button" class="btn btn-primary" style="float-right" href="login.php">BACK</a>
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

	<form method="post" action="<?php $_SERVER["PHP_SELF"]?>" align="center">
		    <h1>Registration </h1>
	         USERNAME:
			<input type="text" name="user" >
			<span class="error">* <?php echo $erruser;?></span>
    <br><br>


			PASSWORD:
			<input type="password" name="pass">
      <span class="error">* <?php echo $erruser;?></span>
			  <br><br>
			Role:
			<select name="role">
				<option value="admin">  Admin: </option>
				 <option value="staff">Staff: </option>
				 <option value="student"> Student:  </option>

			</select><br><br><br>

			<input type="submit" value="submit" name="submit"><br><br>

		</div>
  </div>
</div>
		</form></br>
	</body>
</html>
