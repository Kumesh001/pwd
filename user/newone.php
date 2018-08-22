<?php

include "database.php";

$take=$_POST['uni'];
$id=$_POST['id'];

$q="UPDATE rating
    SET rating_staff='$take'
    WHERE rating.cid='$id'";

if(!mysqli_query($connect,$q))
{
	echo "Unable to update";
}
else{
	echo "Rating Successfully submitted.!";
	?>
     <meta http-equiv="refresh" content="2 url=/bootstrap/DBMS/home.php">

    <?php
}
?>