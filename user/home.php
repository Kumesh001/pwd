<?php 
session_start();
$name= $_SESSION['username'];
?>
<!Doctype html>
<html>
<head>
  <title>PWD MainPage</title>
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
<body style="background:url('images/pic5.jpg')">

<?php include('header.php'); ?>


<div class="container-fluid">

  <!-- navigation side-->
 <div class="row">

  <?php include('navigation.php'); ?>

  <!-- forum is starting here-->
  <div class="col-md-6" id="col6">
     <div class="jumbotron" style="padding:20px;">
         <div class="text_1">
          <?php
            include "database.php";
            $q="SELECT type,zone,title,description,timeofpublish,status,cid FROM complaint ORDER BY timeofpublish DESC";
           
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
                  <div class="col-md-4">
                    <?php
                      if($row['status']==0)
                      {
                        ?>
                        <span class="badge" style="background-color:red;padding-left:10px;margin-left:110px;margin-bottom:5px;">Pending</span>
                        <?php
                      }
                      else if( $row['status']==1)
                      {
                         ?>
                        <span class="badge" style="background-color:grey;padding-left:10px;margin-left:110px;margin-bottom:5px;">Approved</span>
                        <?php
                      }
                      else if($row['status']==2)
                      {
                         ?>
                        <span class="badge" style="background-color:green;padding-left:10px;margin-left:110px;margin-bottom:5px;">Solved</span>
        
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
                  <?php
                  ?>
                  
                  <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#me_<?php echo $row['cid'];?>">Rate the problem</button>
                  <div class="collapse" id="me_<?php echo $row['cid'];?>">
                    <form style="margin:10px;" action="newone.php" method="post">
                      <select name="uni">
                         <option value="-1">Select</option>
                          <option value="5">Good</option>
                          <option value="4">Excellent</option>
                          <option value="3">Average</option>
                          <option value="2">Below Average</option>
                          <option value="1">Satisfied</option>
                          <option value="0">None of above</option>
                      </select>
                      <div class="row">
                        <div class="col-md-4">
                         <input type="submit" name="rate" class="btn btn-success" value="Submit" style="margin-top:5px;height:24px;padding-top:0px;">
                         <input type="hidden" name="id" value="<?php echo $row['cid']; ?>">
                       </div>
                    </div>
                  </form>
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
    <!-- class text closer here -->
 </div>
  <!-- forum ends here-->
</div>

  <?php include('sidebar.php'); ?>

  <!-- row close here-->
 </div>
  <!-- container-fluid close here-->
</div>

<?php include("scripts.php"); ?>

</body>
</html>