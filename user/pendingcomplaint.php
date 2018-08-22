<?php
session_start();
$name=$_SESSION['username'];

?>

<!Doctype html>
<html>
<head>
<title>
Pending Problems
</title>

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
 button{
    width:180px;
  }
 </style>
</head>
<body>

<?php include('header.php'); ?>
<div class="container" style="margin-top:100px;padding:15px;">

  <div class="text text-primary text-center" style="font-size:200%;font-weight:bold">Pending Complaints</div>
  <hr>

  <table class="table table-bordered table-hover">
        <thead>
           <tr>
              <th>Complaint ID</th>
              <th>User name</th>
              <th>Problem</th>
              <th>Date of Filing</th>
              <th>Status</th>              
           </tr>
        </thead>

  <?php
   
   include "database.php";
   
   $input=['NA','Roads Problems','Sanitation Problem','Subway Problem','Electricity Problem','Water Problem','Flyovers Problem'];
   $zone=['NA','East Delhi','South Delhi','West Delhi','North Delhi'];
   $status=['Pending','Approved','Solved'];

   $q="SELECT complaintnumber,type,status,timeofpublish,username FROM complaint
       INNER JOIN user ON complaint.uid=user.uid
       WHERE complaint.status=0";

   $sql=mysqli_query($connect,$q);

   if(mysqli_num_rows($sql)>0)
   {
   while($row=mysqli_fetch_assoc($sql))
    {
    ?>
      <tbody>
         <tr>
           <td><?php echo  $row['complaintnumber']; ?></td>
           <td><?php echo  $row['username']; ?></td>
           
           <td><?php echo  $input[$row['type']]; ?></td>
           <td><?php echo  $row['timeofpublish']; ?></td>
           <td><?php echo  $status[$row['status']]; ?></td>
        
           
          </tr>
       </tbody>    
     <?php
    }
   }
   else{
    ?>
     <tbody>
      <tr>
        <td><?php echo "NULL";?></td>
      
        <td><?php echo "NULL";?></td>
        <td><?php echo "NULL";?></td>
        <td><?php echo "NULL";?></td>
        <td><?php echo "NULL";?></td>
        <td><?php echo "NULL";?></td>
      </tr>
    </tbody>
    <?php
   }
?>  
</table>
<button data-target="home.php" class="btn btn-success" value="Back"><a href="home.php" style="color:white">Back</a></button>
</div>
</body>
</html>