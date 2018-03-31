<?php
include("dpc_conn.php");

if(isset($_POST['submit'])){
  $user = $_POST['user'];
	$pass = $_POST['pass'];
  $query_que= "select username,password,role from login where username = '$user' AND password = '$pass' ";
   $result = mysqli_query($conn,$query_que);//$conn=database,$query_que=query...
   $check = mysqli_fetch_array($result);
  if (!$result)
    {
        die('Could not connect:'.mysqli_error());
    }
	else
	{

		if($check["role"]=="student")
		{
			header("Location: stu_reg.php");
		}
		else if($check["role"]=="staff")
		{
			header("Location: stff_reg.php");
		}
		else if($check["role"]=="admin")
		{
			header("Location: adopen.php");
		}
	}
  }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Bootstrap Theme Company</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <style>

</style>
 <body>

 <div class="jumbotron">
  <div class="page-header text-center">

    <h1>KONGU ENGINEERING COLLEGE</h1><br>
    </div>
  <form method="post">
     <div class="row">
  <div class="col-sm-4">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>
   <font align="right">
      <h1 align="center">LOGIN PAGE</h1>
  <div class="col-sm-6">
      <label><b>Username</b></label>
       <input type="username" id="user" placeholder="Enter username" name="user" required><br><br><br><br>
           </div>
    <div class="col-sm-6">
      <label><b>Password</b></label>
       <input type="password"  id="pass" placeholder="Enter Password" name="pass" required><br><br>
  		<button type="submit" class="btn btn-default" name="submit">Submit</button><br><br>
     <span class="psw">NEW REGISTRATION: <a href="ad_reg.php">GO</a></span><br><br>
      <input type="checkbox" checked="checked"> Remember me
  	     </div>
    <div class="col-sm-6">

      <input type="reset" class="btn btn-default"style.display='none' value="Cancel">
      <span class="psw" >forgotten password:</span>
    </div>
  </div>
</div>

  </font>
  </form>
  </body>
  </html>
