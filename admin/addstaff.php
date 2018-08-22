<?php
include "database.php";
$username = mysqli_real_escape_string($connect, $_POST['username']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$phone = mysqli_real_escape_string($connect, $_POST['phone']);
$address = mysqli_real_escape_string($connect, $_POST['office']);
$work = mysqli_real_escape_string($connect, $_POST['work']);
$sip = $_SERVER['REMOTE_ADDR'];


$check="SELECT username FROM staff";

$sqlcheck=mysqli_query($connect,$check);

if(mysqli_num_rows($sqlcheck)>0)
{
  while($checkrow=mysqli_fetch_assoc($sqlcheck))
  {
  	if($checkrow['username']==$username)
  	{
  	  echo "Username already registered.".'<br>'.'<br>';
  	  echo 'please try again !'.'<br>';
  	  ?>
  	  <meta http-equiv="refresh" content="2; url=/bootstrap/DBMS/admin.php">
  	  <?php
  	  die();
  	}
  }	
}

$q = "INSERT INTO staff(username,phoneNumber,officeAddress,workExperience,email,password, ip)
      VALUES('$username','$phone','$address','$work','$email','$password','$sip')";

if(isset($_POST['submitme'])){
	$sql = mysqli_query($connect, $q);
	if($sql)
	{
	 echo "Signed Up Successfully";
	 ?>
	 <meta http-equiv="refresh" content="1; url=/bootstrap/DBMS/admin.php">
	 <?php
	}
	else
  {
		echo "Error " . mysqli_error();
  ?>
    <meta http-equiv="refresh" content="1; url=/bootstrap/DBMS/admin.php">
    <?php
  }
}
else if(isset($_POST['cancel']))
{
  echo '<h2>'."Sign up Failed".'</h2>';
  ?>
  <meta http-equiv="refresh" content="1; url=/bootstrap/DBMS/admin.php">
    <?php
 
}

?>
