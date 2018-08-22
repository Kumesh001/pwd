<?php
session_start();
$user_id = $_SESSION['uid'];
  include "database.php";
  $option_problem=mysqli_real_escape_string($connect,$_POST['sel_problem']);
  $option_zone=mysqli_real_escape_string($connect,$_POST['zone_list']);
  $title=mysqli_real_escape_string($connect,$_POST['title']);
  $description=mysqli_real_escape_string($connect,$_POST['description']);
  $sip = $_SERVER['REMOTE_ADDR'];
  
  $complant_number=rand(100,500);

  $check="SELECT complaintnumber FROM complaint";

  $checkSql=mysqli_query($connect,$check);

  if(mysqli_num_rows($checkSql)>0)
  {
    while($row=mysqli_fetch_assoc($checkSql))
    {
      if($row['complaintnumber']==$complant_number)
      {
        $complant_number=rand(100,500);
      }


    }
  } 
  $q="INSERT INTO complaint(uid,type,zone,title,description,ip,complaintnumber) VALUES('$user_id','$option_problem',
  	'$option_zone','$title','$description','$sip',$complant_number)";
 
 if(isset($_POST['submit'])){
	$sql = mysqli_query($connect, $q);
	if($sql)
	{
     echo "Submitted Successfully";
     ?>
     <meta http-equiv="refresh" content="2 url=/bootstrap/DBMS/filecomplaint.php">
     <?php
    }
	else{
		echo "Error " . mysqli_error($connect);
	}
}

?>