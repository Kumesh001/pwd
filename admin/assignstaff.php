<?php
include "database.php";

session_start();

$id=$_SESSION['aid'];

$cno=$_POST['cno'];
$name=$_POST['name'];
$deadline=$_POST['date'];
$remark=$_POST['remark'];
$sip=$_SERVER['REMOTE_ADDR'];

$fetch="SELECT cid,uid,type FROM complaint
        WHERE complaintnumber='$cno'";

$fetchsql=mysqli_query($connect,$fetch);

$row=mysqli_fetch_assoc($fetchsql);

$cid=$row['cid'];
$uid=$row['uid'];
$type=$row['type'];



$q="INSERT INTO complaint_dept(sid,uid,cid,aid,expected_date,p_assigned,remark,ip)
     VALUES('$name','$uid','$cid','$id','$deadline','$type','$remark','$sip')";

$p="INSERT INTO rating(cid,sid) VALUES('$cid','$name')";

$sql="UPDATE complaint SET statusId='1'
      WHERE complaintnumber='$cno'";

if(isset($_POST['staffmember'])){
	$sql_check = mysqli_query($connect, $sql);
	if($sql_check)
	{
	 echo "Done Successfully";
	}
	else
	{
	 echo "Some".mysqli_error($connect);
	}
}

 if (!mysqli_query($connect,$q))
  {
  die('Error: '.mysql_error($connect));
  }
  if (!mysqli_query($connect,$p))
  {
  die('Error: '.mysql_error($connect));
  }

?>
<meta http-equiv="refresh" content="1; url=/bootstrap/DBMS/admin.php">
<?php

?>