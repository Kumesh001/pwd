<?php

include "database.php";

$username = mysqli_real_escape_string($connect, $_POST['username']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$phone = mysqli_real_escape_string($connect, $_POST['phone']);
$address = mysqli_real_escape_string($connect, $_POST['office']);
$work = mysqli_real_escape_string($connect, $_POST['work']);
$id = mysqli_real_escape_string($connect, $_POST['index']);


if(isset($_POST['update']))
{

 $q="UPDATE `staff`
     SET `username`='$username',
         `email`='$email',
         `password`='$password',
         `phoneNumber`='$phone',
         `officeAddress`='$address',
         `workExperience`='$work'
        WHERE staff.sid='$id'";

 if(mysqli_query($connect, $q)) 
   {
     echo "Record updated successfully";
   }
 else{
    echo "Error updating record: ".mysqli_error($conn);
   }
  ?>
  <meta http-equiv="refresh" content="2; url=/bootstrap/DBMS/admin.php">
<?php
}
else if(isset($_POST['cancel'])){
  ?>
  <meta http-equiv="refresh" content="2; url=/bootstrap/DBMS/admin.php">
  <?php
}

?>