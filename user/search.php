<?php
  session_start();
  $id=$_SESSION['uid'];
?>

<!Doctype html>
<html>
<head>
	<title>Home</title>
 <meta charset="UTF-8">
  <meta name="keywords" content="HTML,CSS,JavaScripts,JQuery">
  <meta name="author" content="Umesh">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link href="stylesheet.css" rel="stylesheet" type="text/css">
  <link href="newcss.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">

</head>
<body>
  <?php include('header.php'); ?>
  <div class="container-fluid">
  	<div class="row">
  		<?php include('navigation.php'); ?>
  	 <div class="col-md-6" id="col6">
  	   <div class="jumbotron" style="padding:20px;">
  	   	    <div class="text_1">
          <?php
            include "database.php";
            $i=$_REQUEST['search'];

        
            $q="SELECT type,zone,title,description,timeofpublish,status FROM complaint
                INNER JOIN user ON user.uid=complaint.uid
                WHERE user.pincode like '%$i%' OR
                     user.locality like '%$i%' OR
                     complaint.timeofpublish like '%$i%' OR 
                     complaint.complaintnumber like '%$i%'
                     ORDER BY timeofpublish DESC";
           
            $sql=mysqli_query($connect,$q);

            if(mysqli_num_rows($sql)>0) 
            {
              $input=['NA','Roads Problems','Sanitation Problem','Subway Problem','Electricity Problem','Water Problem','Flyovers Problem'];
              $zone=['NA','East Delhi','South Delhi','West Delhi','North Delhi'];
              while($row=mysqli_fetch_assoc($sql)){
                ?>
                <div class="well">
                   <div class="row">
                    <div class="col-md-8">
                  <h2>Type :<?php echo  $input[$row['type']]; ?></h2>
                </div>
                  <div class="col-md-2 col-md-offset-2">
                    <?php
                      if($row['status']==0)
                      {
                        ?>
                        <span class="badge" style="background-color:red;">Pending</span>
                        <?php
                      }
                      else if( $row['status']==1)
                      {
                         ?>
                        <span class="badge" style="background-color:grey;">Approved</span>
                        <?php
                      }
                      else if($row['status']==2)
                      {
                         ?>
                        <span class="badge" style="background-color:green;">Solved</span>
                        <?php

                      }
                    ?>
                  </div>
                </div>

                  <h4 style="font-weight:NULL;color:black">Zone :<?php echo  $zone[$row['zone']]; ?></h4>
                  <h4>Title :<?php echo  $row['title']; ?></h4>
                  <p> Description: <br> <?php echo  $row['description']; ?></p>
                  <div class="text text-right" >
                    <p style="font-size:15px;">Date of Publish: <?php echo  $row['timeofpublish']; ?></p>
                  </div>
                </div>
                <?php
              }
             }
            else
            {
              echo "Zero Result !!";
            }
 ?>
    </div>

  	   </div>
  	</div>
  	<?php include('sidebar.php'); ?>
  	</div>
  </div>

<?php include("scripts.php"); ?>
</body>
</html>