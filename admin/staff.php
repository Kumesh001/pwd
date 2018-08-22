<?php
session_start();
$name=$_SESSION['username'];
$id=$_SESSION['sid'];

?>

<!doctype hmtl>
<html>
<head>
  <title>Staff Details</title>
 <meta charset="UTF-8">
  <meta name="keywords" content="HTML,CSS,JavaScripts,JQuery">
  <meta name="author" content="Umesh&Ashutosh">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link href="stylesheet.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<style>
nav ul li:hover{
	background-color: transparent;
}
nav ul li a:hover{
	background-color: transparent;
}
nav ul:hover{
	background-color: transparent;
}
</style>

</head>
<body style="background:url('images/pic3.jpg')">
	<nav class="nav navbar-inverse navbar-fixed-top">
		<div class="navbar-header" style="width:500px;">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
                <span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="admin.php" class="navbar-brand" style="padding-top:0px;padding-bottom:0px;">
			  <span class="fa fa-user fa-3x" style="height:50px"></span>
			</a>
			 <div class="text text-warning" style="font-size:30px;padding-top:10px;color:white">Staff Panel</div>
		</div>
		  <ul class="nav navbar-nav navbar-right" role="navigation" style="list-style:none;padding-right:20px;">
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-2x" style="padding-right:5px;"></i><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li>
                        <a href="#profile1" data-toggle="modal" style="color:white"><i class="fa fa-fw fa-user"></i> Profile</a>
                      </li>
                      <li>
                        <a href="#" style="color:white"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                      </li>
                      <li>
                        <a href="#" style="color:white"><i class="fa fa-fw fa-gear"></i> Settings</a>
                      </li>
                      
                      <li>
                        <a href="logout.php" style="color:white"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                      </li>
		         </ul>
		    </ul>		
	</nav>

    <!-- modal body ends here-->

	<div class="container" style="margin:80px;height:600px;">
		<div class="text text-primary text-capitalize" style="margin-top:30px;margin-left:20px;">
				<h2>All Complaint assigned to Staff Name:
					<b style="color:black"><?php echo $name;?></b>
				</h2>
	    </div>
		<div class="col-md-5">
		  <div class="panel-group">
           	 <div class="panel panel-default">
           		<div class="panel-heading">
           			<h3 class="panel-title">
           				<a href="#complaint" data-toggle="collapse">Complaint Assigned</a>
           			</h3>
           		 </div>
           		 <div class="panel-collapse collapse" id="complaint">
                <div class="panel-body">
                	<table class="table table-striped table-hover">
                		<thead>
                			<th>Compaint no.</th>
                			<th>Problem name</th>
                			<th>Status</th>
                			<th>Rating</th>
                        </thead>

                     <?php
                      include "database.php";
                       
                      $type=['NA','Roads Problems','Sanitation Problem','Subway Problem','Electricity Problem','Water Problem','Flyovers Problem'];
                      $status=['Pending','Approved','Solved'];

                      $s="SELECT complaintnumber,type,status,rating_staff FROM complaint
                          INNER JOIN rating ON complaint.cid=rating.cid
                          WHERE sid='$id'";
                    
                       $sql=mysqli_query($connect,$s);

                       if(mysqli_num_rows($sql)>0)
                       {
                          while($row=mysqli_fetch_assoc($sql))
                          {
                          	?>
                           <tbody>
                           	 <td><?php echo $row['complaintnumber']; ?></td>
                           	 <td><?php echo $type[$row['type']]; ?></td>
                           	 <td><?php echo $status[$row['status']]; ?></td>
                           	 <td><?php echo $row['rating_staff'].' '.'Star' ?></td>
                           
                           </tbody>
                           <?php
                          }
                        

                       }
                       else
                       {
                         ?>
                         <tbody>
                           	 <td>NULL</td>
                           	 <td>NULL</td>
                           	 <td>NULL</td>
                           	 <td>NULL</td>
                          </tbody>
                           <?php

                       }


                      ?>

                      </table>
                      <button type="button" data-toggle="collapse" data-target="#update" class="btn btn-warning col-md-4">Update Record</button><br>
                      <div class="collapse" id="update" style="margin-left:10px;padding:30px;">
                      	<form method="post" action="update_status.php" style="border:2px solid grey;padding:5px;">
                           <div class="form-group" >
                           	<label for="cid">Complaint No.</label>
                           	<input type="number" placeholder="enter complaint number" name="cno">
                           </div>

                            <div class="form-group">
                            	<label for="status">Status:</label>
                            	<select name="sel">
                            	  <option value="0">Pending</option>
                            	  <option value="1">Approved</option>
                            	  <option value="2">Solved</option>
                            	</select>
                            </div>
                          <input type="submit" name="change" value="Update" class="btn btn-success">
                           </form>
                     </div>  
                </div>
                 </div>
             </div>
             <!-- panel default close here-->
          </div>  	
           <!-- panel group -->
          </div>
    </div>
	<?php include("scripts.php"); ?>
</body>
</html>