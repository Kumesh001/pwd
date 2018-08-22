<?php

include "database.php";

$cno=$_POST['cno'];
$status=$_POST['sel'];

$q="UPDATE complaint
    SET status='$status'
    WHERE complaintnumber='$cno'";
    
$sql=mysqli_query($connect,$q);

if($sql)
{
   echo "Database Updated Successfully";
   ?>
     <meta http-equiv="refresh" content="2 url=/bootstrap/DBMS/staff.php">
     <?php
}
else
{
  echo "Error ".mysqli_error($connect);
	
}

?>

