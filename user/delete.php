<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  

<?php
  include "database.php"; 
  session_start();
  $id=mysqli_real_escape_string($connect, $_POST['id']);
  
 if($id=="")
 {
 	 ?>
    <div class="alert">Please enter valid User ID!, then try again!</div>
    <?php
 }
 else
 {
  $a="DELETE FROM user WHERE uid='$id' ";

   if (mysqli_query($connect, $a)) {
    echo "Record deleted successfully";
   } else {
    echo "Error deleting record: " . mysqli_error($conn);
   }
?>
<?php 
 }
 ?>
<meta http-equiv="refresh" content="1; url=/bootstrap/DBMS/admin.php">