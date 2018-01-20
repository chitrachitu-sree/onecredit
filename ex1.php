<?php
$user=$_POST["value"];
$fact=1;
for(  $i=1;$i <= $user;$i++)
 {
	 $fact = $fact * $i;
	 
 }
  echo $fact."<br>";
/* $fibo1 = 0;
 $fibo2=1;
for(  $i=1;$i <= $user;$i++)
 {
	 $fibo3 = $fibo1 + $fibo2;
	  echo $fibo3."<br>";
 $fibo1=$fibo2;
 $fibo2=$fibo3;	
 }*/
 ?>
 <html>
 <body>
 <form method="post">
 <input type="text" name="value">
 <input type="submit" value="yes">
 </form>
 </body>
 </html>