<?php 

include "database.php";

$index=mysqli_real_escape_string($connect,$_POST['sel_id']);

?>
<!Doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="HTML,CSS,JavaScripts,JQuery">
  <meta name="author" content="Umesh">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <!--<link href="stylesheet.css" rel="stylesheet" type="text/css">-->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  
  <script src="js/jquery.js" ></script>
  <script src="js/bootstrap.js"  ></script>
  <script src="js/jquery.ui.js" ></script>
  <script src="js/jquery.color.js" ></script>
  <style>
  .labeltext{
  	font-size:20px;
  }
.form-group{

	width:300px;
}
  </style>
</head>
<body style="background-color:#9ebbc7;margin-top:10px;">
	<div class="container" style="background:url('images/pic4.jpg');">
		<div class="text text-danger" style="font-size:40px;margin:20px;border-bottom:2px solid grey;width:380px;">
			Update Staff Details
		</div>
		<form class="form" style="padding-left:30px;width:600px;" method="post" action="update.php">
			<div class="well" style="padding-left:40px;background-color:#5ea2b5;">
		  <?php

		    $q="SELECT * FROM staff WHERE staff.sid='$index'";

		    $sql=mysqli_query($connect,$q);
            
		    if(mysqli_num_rows($sql)>0)
		    { 
		      $row=mysqli_fetch_array($sql);
           	
           	 ?>

             <div class="form-group">
             	<label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Username<span class="required">*</span></label>
	            <input type="text" name="username" class="form-control" id="name" required value=<?php echo $row['username']; ?> >
			 </div>
			 <div class="form-group">
             	<label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Password<span class="required">*</span></label>
	            <input type="text" name="password" class="form-control" id="password;" required value=<?php echo $row['password']; ?> >
			 </div>
			 <div class="form-group">
             	<label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Contact Number<span class="required">*</span></label>
	            <input type="text" name="phone" value=<?php echo $row['phoneNumber']; ?> class="form-control" id="phone" required>
			 </div>
			 <div class="form-group">
             	<label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Office address<span class="required">*</span></label>
	            <input type="text" name="office" class="form-control" id="address" required value=<?php echo $row['officeAddress']; ?> >
			 </div>
			 <div class="form-group">
             	<label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Work Experience<span class="required">*</span></label>
	            <input type="text" name="work" class="form-control" id="work" required value=<?php echo $row['workExperience']; ?> >
			 </div>
			 <div class="form-group">
             	<label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >E-mail<span class="required">*</span></label>
	            <input type="text" name="email" class="form-control" id="email" required value=<?php echo $row['email']; ?> >
			 </div>
			 <div class="form-group">
			 	<div class="row">
			 		<div class="col-md-4">
			 		 <input type="hidden" value=<?php echo $index; ?> name="index">
			 	     <input type="submit" name="update" value="Update" class="form-control btn btn-success col-md-2">
			 	    </div>
			 	    <div class="col-md-4">
			 	      <input type="submit" name="cancel" value="Cancel" class="form-control btn btn-danger col-md-2">
			        </div>
			 	</div>
			 </div>
			    <?php
			}
			else{
			    echo "Unable to connect to the database";
			?>
			<meta httP-equiv="refresh" content="2;url=/bootstrap/DBMS/admin.php">
			<?php
            }
            ?>
          </div>
		</form>
	</div>
</body>
</html>