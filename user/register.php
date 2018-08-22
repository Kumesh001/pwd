<?php
include "database.php";
$username = mysqli_real_escape_string($connect, $_POST['username']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$pincode = mysqli_real_escape_string($connect, $_POST['pincode']);
$address = mysqli_real_escape_string($connect, $_POST['address']);
$locality = mysqli_real_escape_string($connect, $_POST['locality']);
$mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
$city = mysqli_real_escape_string($connect, $_POST['city']);
$sip = $_SERVER['REMOTE_ADDR'];


$check="SELECT username FROM user";

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
  	  <meta http-equiv="refresh" content="2; url=/bootstrap/DBMS/index.php">
  	  <?php
  	  die();
  	}
  }	
}

$q = "INSERT INTO user(username, email, password, pincode, city, address,locality,mobile, ip) VALUES('$username',
	'$email','$password','$pincode','$city','$address','$locality','$mobile', '$sip')";

if(isset($_POST['signup'])){
	$sql = mysqli_query($connect, $q);
	if($sql)
	{
	 echo "Signed Up Successfully";
	 ?>
	 <meta http-equiv="refresh" content="1; url=/bootstrap/DBMS/index.php">
	 <?php
	}
	else
		echo "Error " . mysqli_error();
}

?>
