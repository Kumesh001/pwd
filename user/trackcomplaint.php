<?php
session_start();
$id=$_SESSION['uid'];
$name=$_SESSION['username'];

 ?>

<!Doctype html>
<head>
	<title>Track problem</title>

  <meta charset="UTF-8">
  <meta name="keywords" content="HTML,CSS,JavaScripts,JQuery">
  <meta name="author" content="Umesh">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link href="newcss.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  
  <script src="js/jquery.js" ></script>
  <script src="js/bootstrap.js"  ></script>
  <script src="js/jquery.ui.js" ></script>
  <script src="js/jquery.color.js" ></script>
  <style>

  </style>
</head>
<body>
	<?php include('header.php');?> 

	<div class="container-fluid">
	<div class="row">

		<?php include('navigation.php'); ?>

       <div class="col-md-6" id="col6">
          <div class="jumbotron" style="padding:20px;">
            

          <table class="table table-hover table-bordered">
          	<thead>
          		<tr>
          		  <th>Username</th>
          		  <th>Date of complaint Filing</th>
          		  <th>Problem</th>
          		  <th>status</th>
          		</tr>
            </thead>
          
           <?php 
             
            include "database.php";

            $q="SELECT username,timeofpublish,type,status FROM user INNER JOIN complaint ON user.uid=complaint.uid WHERE user.uid='$id'";
          
             $status=['Pending','Approved','Solved'];
             $input=['NA','Roads Problems','Sanitation Problem','Subway Problem','Electricity Problem','Water Problem','Flyovers Problem'];

             $sql=mysqli_query($connect,$q);

             if(mysqli_num_rows($sql)>0)
             {
             	while($row=mysqli_fetch_assoc($sql))
             	{
             	  ?>
                     <tbody>
                     	<tr>
                     		<td><?php echo $row['username']; ?></td>
                     		<td><?php echo $row['timeofpublish']; ?></td>
                     		
                     		<td><?php echo $input[$row['type']]; ?></td>
                     		<td><?php echo $status[$row['status']]; ?></td>
                     	</tr>
                     </tbody>
      
             	  <?php
                }
             }
             else{
             	?>
             	 <tbody>
                     	<tr>
                     		<td><?php echo $name; ?></td>
                     		<td><?php echo "NULL"; ?></td>
                     		<td><?php echo "NULL"; ?></td>
                     		<td><?php echo "NULL"; ?></td>
                     	</tr>
                     </tbody>
                     <?php

             }  
            ?>
           </table>
           <button data-target="home.php" class="btn btn-success" value="Back">
             <a href="home.php" style="color:white">Back</a>
          </button>
          </div>
       </div>

       <?php include('sidebar.php'); ?>

   </div>


</div>




</body>
</html>
