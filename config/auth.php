<?php 
session_start();
include "database.php";

$check=$_POST['sel_type'];
$u = $_POST['username'];
$p = $_POST['password'];


if($check==0)
{

$q = "SELECT * FROM user WHERE username = '$u' AND password = '$p'"; 
$sql = mysqli_query($connect, $q);

if(mysqli_num_rows($sql) > 0){
$d = mysqli_fetch_array($sql);
$_SESSION['username'] = $d['username'];
$_SESSION['password'] = $d['password'];
$_SESSION['uid'] = $d['uid'];
?>
Logged in Successfully, Redirecting in 2 Seconds
<meta http-equiv="refresh" content="2; url=/bootstrap/DBMS/home.php">
<?php
}
else{
	?>
 <h2>Invalid Username and Password</h2><br><br>
 Redirecting in 2 sec...
  <meta http-equiv="refresh" content="2 url=/bootstrap/DBMS/index.php">
<?php
}
}
else if($check==1)
{

 $q="SELECT * FROM staff WHERE username='$u' AND password='$p'";
 $sql=mysqli_query($connect,$q);
 
 if(mysqli_num_rows($sql)>0)
 {
 	$d=mysqli_fetch_array($sql);
 	$_SESSION['username'] = $d['username'];
    $_SESSION['password'] = $d['password'];
    $_SESSION['sid'] = $d['sid'];
   ?>
   Logged in Successfully, Redirecting in 3 sec...
   <meta http-equiv="refresh" content="1;url=/bootstrap/DBMS/staff.php">
   <?php
 }
 else{
 	?>
 	<h2>Invalid Username and Password</h2><br><br>
    Redirecting in 2 sec...
    <meta http-equiv="refresh" content="1 url=/bootstrap/DBMS/index.php">
  <?php
 }
}
else if($check==2){
 $q="SELECT * FROM admin WHERE username='$u' AND password='$p'";
 $sql=mysqli_query($connect,$q);
 
 if(mysqli_num_rows($sql)>0)
 {
 	$d=mysqli_fetch_array($sql);
 	$_SESSION['username'] = $d['username'];
    $_SESSION['password'] = $d['password'];
    $_SESSION['aid'] = $d['aid'];
   ?>
   Logged in Successfully, Redirecting in 3 sec...
   <meta http-equiv="refresh" content="1;url=/bootstrap/DBMS/admin.php">
   <?php
 }
 else{
 	?>
 	<h2>Invalid Username and Password</h2><br><br>
    Redirecting in 2 sec...
    <meta http-equiv="refresh" content="1 url=/bootstrap/DBMS/index.php">
  <?php

}

	
}
?>