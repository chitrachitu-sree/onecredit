<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-x: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}


.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {border-radius: 70%;}
.button2 {border-radius: 70%;}

</style>

<body>
<div class="jumbotron text-center">
  <h1>KONGU ENGINEERING COLLEGE</h1><br>
  <h1>STUDENT DETAILS</h1>
  <a role="button" class="btn btn-primary" style="float-right" href="login.php">LOGOUT</a>
  </div>
<div class="container">
  <div class="row">
    <div class="col-sm-5">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; STUDENT DETAILS</span>
            <div id="myNav" class="overlay">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <div class="overlay-content">
            <a href="student_reg.php">Add Student Course</a>
            <a href="stu_view.php">Student Course Details</a>
             </div>
 </div>
    </div>

     <script>
     function openNav() {
         document.getElementById("myNav").style.width = "1350px";
     }

     function closeNav() {
         document.getElementById("myNav").style.width = "0";
     }
     </script>
 </div>
</div>

</body>
</html>
