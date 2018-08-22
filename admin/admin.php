<?php
session_start();
$id=$_SESSION['aid'];
$name=$_SESSION['username'];

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
 
  <style>
   #admin_nav ul li{
   	font-size: 20px;
   	color:black;
   }
   a:link{
   	color:black;
   }

   #admin_nav ul li a:link{
   	color:black;
   	
   }#admin_nav ul li a:hover{
   	background-color:#98FB98; 
   	
   }#admin_nav ul li a:visited{
   		color:black;
   	
   }#admin_nav ul li a:active{
   		color:black;
   }
   .required{
    color: red;
   }
   #col_2_label{
    width:105px;
    font-size:20px;
    padding-left:10px;
    }
   #col_2_input{
      padding-left: 0px;
      width: 135px;
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
			 <div class="text text-warning" style="font-size:30px;padding-top:10px;color:white">Admin Panel</div>
		</div>
		  <ul class="nav navbar-nav navbar-right" role="navigation" style="list-style:none;padding-right:20px;">
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-2x" style="padding-right:5px;"></i><?php echo $name; ?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li>
                        <a href="#profile1" data-toggle="modal"><i class="fa fa-fw fa-user"></i> Profile</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                      </li>
		         </ul>
		    </ul>		
	</nav>
 <div class="modal fade" role="dialog" id="profile1"> 
  <div class="modal-dialog"> 
   <!-- content-->
   <div class="modal-content">
    <div class="modal-header" style="background-color:#DCDCDC;">
      <button type="button" class="close" data-dismiss="modal" style="width:20px;">&times;</button>
      <h4 class="modal-title" style="text-align:center;font-size:200%;font-weight:bold;padding-left:20px;margin-left:10px;"> User Profile</h4>
    </div>

   <!-- modal body-->
    <div class="modal-body" style="background:url('images/pic2.jpg');height:350px;">
      <?php
         include "database.php";
          $q="SELECT * FROM admin
              WHERE aid='$id'";
          $sql=mysqli_query($connect,$q);
          if(mysqli_num_rows($sql)>0)
            {
             while($row=mysqli_fetch_assoc($sql))
               {
                ?>
                <form class="form" method="post" action="">
                  <div class="row">
                    <div class="col-md-3" style="left:130px;">
                      <i class="fa fa-fw fa-user fa-5x"></i>
                    </div>
                    <div class="col-md-4" style="left:70px;">
                       <h2><?php echo $row['username']; ?></h2>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3" id="coo_3" style="margin-left: 80px;padding-top: 25px;padding-left: 60px;">
                      <label for="email" style="font-size:20px;">E-mail:</label>
                    </div>
                    <div class="col-md-4" >
                       <h3><?php echo $row['email']; ?></h3>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-3" id="coo_3"  style="margin-left: 65px;padding-top: 25px;padding-left:0px;width:170px;">
                      <label for="number" style="font-size:20px;">Mobile Number:</label>
                    </div>
                    <div class="col-md-4">
                       <h3><?php echo $row['mobilenumber']; ?></h3>
                    </div>
                  </div>
                 <div class="row">
                    <div class="col-md-3" id="coo_3"  style="margin-left:70px;padding-top: 25px;padding-left:55px;width:170px;">
                      <label for="number" style="font-size:20px;">Address:</label>
                    </div>
                    <div class="col-md-4">
                       <h3><?php echo $row['officeAddress']; ?></h3>
                    </div>
                 </div>
                 <input type="submit" class="btn btn-success" value="Edit details" name="detail" style="margin-left:420px;width:118px;box-shadow: 0 0 5px black;">
                </form>
                 <?php
              }
            }
         ?>
    </div>
    <!-- modal body ends here-->
  
 </div>
 <!-- content close here-->
</div>
</div>




	<div class="container-fluid" style="padding:15px;">
	<div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-top:70px;" id="admin_nav">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li>
				<li><a href="#user" data-toggle="tab">User Details</a></li>
				<li><a href="#staff" data-toggle="tab">Staff Details</a></li>
				<li><a href="#problem" data-toggle="tab" id="content">Problem filed</a></li>
				<li><a href="#complaint_dept" data-toggle="tab">Compaint Department</a></li>
			</ul>
	</div>
      <div class="tab-content" >

      	<!-- dashboard tab content -->

		 <div id="dashboard" class="tab-pane fade in active">
			<div class="text text-danger" style="font-size:40px;margin-top:15px;border-bottom:1px solid grey;width:550px;">
				Dashboard Statistics Overview
		    </div>
			</div>

		 <!-- user tab content-->

		 <div id="user" class="tab-pane fade in" style="padding:10px;margin-top:15px;padding-bottom:10px;">
		 	<table class="table table-hover table-bordered" style="margin-top:15px;padding:5px;background-color:#5F9EA0;">
				<thead>
	     			<tr>
	     				<th>User Id</th>
					   <th>Username</th>
			    		<th>Password</th>
						<th>E-mail</th>
						<th>Contact No.</th>
						<th>PinCode</th>
						<th>City</th>
						<th>Address</th>
						<th>Locality</th>
						<th>Time of Signup</th>
					</tr>
				</thead>
			   <?php
                    
                 include "database.php"; 

                 $q="SELECT uid,username,email,password,pincode,city,locality,address,timeofsignup,mobile FROM user";
                 $sql=mysqli_query($connect,$q);
                   if(mysqli_num_rows($sql)>0)
                       {
                         
                         while($row=mysqli_fetch_assoc($sql))
                           {
                           ?>
                            <tbody>
							  <tr>
								<td><?php echo  $row['uid']; ?></td>
								<td><?php echo  $row['username']; ?></td>
								<td><?php echo  $row['password']; ?></td>
								<td><?php echo  $row['email'];    ?></td>
								<td><?php echo  $row['mobile'];   ?></td>
								<td><?php echo  $row['pincode'];  ?></td>
								<td><?php echo  $row['city'];     ?></td>
								<td><?php echo  $row['address'];  ?></td>
								<td><?php echo  $row['locality']; ?></td>
								<td><?php echo  $row['timeofsignup']; ?></td>
							   </tr>
						     </tbody>
                           <?php
                         }
                       }
                       else{
                       	?>
                       	<tbody>
							  <tr>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
							   </tr>
						     </tbody>
						     <?php
                         }
                       ?>
                   
                     </table>
      
                  	<button type="button" data-toggle="collapse" data-target="#delete" value="Delete User Account">
                  		Delete User Account<i class="fa fa-trash-o fa-2x" aria-hidden="true"  style="padding-left:10px;"></i>
                  	</button>
                  	<div class="collapse" id="delete" style="margin:5px;">
                  		<form method="post" action="delete.php" >

                  		   <div class="row">
                            <div class="col-md-4">
                  			<input type="number"  name="id" placeholder="Enter the User ID" class="form-control">
                  		    </div>
                  		    <div class="col-md-2">
                  			<input type="submit" class="btn btn-success" value="Submit">
                  		</div>
                  		   </div>
                  		</form>
                  		
                  	</div>
                  	
           </div>

      <!-- staff tab content -->

    <div id="staff" class="tab-pane fade in" style="padding:5px;margin-top:15px;">
    	<table class="table table-hover table-bordered" style="margin-top:15px;padding:5px;background-color:#5F9EA0;">
				<thead>
	     			<tr>
	     				<th>Staff Id</th>
					   <th>Staff name</th>
			    		<th>Password</th>
						<th>E-mail</th>
						<th>Contact No.</th>
						<th>Work Experience</th>
						<th>Office Address</th>
					</tr>
				</thead>
			   <?php
                 $q="SELECT sid,username,email,password,phoneNumber,officeAddress,workExperience FROM staff";
                 $sql=mysqli_query($connect,$q);
                   if(mysqli_num_rows($sql)>0)
                       {
                         
                         while($row=mysqli_fetch_assoc($sql))
                           {
                           	
                           ?>
                            <tbody>
							  <tr>
								<td><?php echo  $row['sid']; ?></td>
								<td><?php echo  $row['username']; ?></td>
								<td><?php echo  $row['password']; ?></td>
								<td><?php echo  $row['email'];    ?></td>
								<td><?php echo  $row['phoneNumber'];   ?></td>
								<td><?php echo  $row['workExperience'];  ?></td>
								<td><?php echo  $row['officeAddress'];     ?></td>
							   </tr>
						     </tbody>

                           <?php
                         }
                       }
                       else{
                       	?>
                       	<tbody>
							  <tr>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
							
							   </tr>
						     </tbody>
						     <?php
                         }
                       ?>
                   
                     </table>
          <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#staffdetails">
          	<i class="icon-fixed-width icon-pencil"></i>Update Staff Details
          </button>
          <button type="buttton" class="btn btn-primary" data-toggle="collapse" data-target="#addstaffmember">
            <i class="icon-fixed-width icon-pencil"></i>Add more Member
          </button>

          <!-- add member function and form submission -->
          <div class="collapse" id="addstaffmember">
            <div class="well" style="padding-left:40px;background-color:#5ea2b5;margin:30px;">

              <form class="form" style="margin:5px;padding:10px;" method="post" action="addstaff.php" onsubmit="return checkPassword();">
                 <div class="row">

                   <div class="col-md-4">

                      <div class="form-group">
                        <label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Username<span class="required">*</span></label>
                         <input type="text" name="username"  placeholder="e.b Rohan" class="form-control" id="name" required  >
                      </div>

                   </div>
                   </div>
                   <div class="row">
                    <div class="col-md-4">

                         <div class="form-group">
                              <label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Password<span class="required">*</span></label>
                              <input type="password" name="password"  placeholder="Your password please.!"class="form-control" id="pass1;" required >
                         </div>
               
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                              <label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Re-Password<span class="required">*</span></label>
                              <input type="password" name="confirmPassword"  placeholder="confirm your password please.!"class="form-control" id="pass2;" required >
                         </div>
                     </div>
                 </div>
                  <div class="row">
                    <div class="col-md-4">
                 <div class="form-group">
                      <label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Contact Number<span class="required">*</span></label>
                      <input type="number" name="phone" class="form-control"  placeholder="91-XXXXXXXXX" id="phone" required>
                 </div>
               </div>
               <div class="col-md-4">

                 <div class="form-group">
                      <label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Office address<span class="required">*</span></label>
                      <input type="text" name="office" class="form-control" id="address" placeholder="e.g Hauz Khas,New Delhi" required >
                 </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                 <div class="form-group">
                      <label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Work Experience<span class="required">*</span></label>
                      <input type="text" name="work" class="form-control" id="work" placeholder="Describe your qualifications..!" required >
                 </div>
                </div>
                <div class="col-md-4">
                 <div class="form-group">
                      <label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >E-mail<span class="required">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Abc@example.com" required >
                 </div>
              </div>
            </div>

               <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                     <input type="submit" name="submitme" value="Submit" class="form-control btn btn-success col-md-2">
                    </div>
                    <div class="col-md-2">
                      <input type="submit" name="cancel" value="Cancel" class="form-control btn btn-danger col-md-2">
                      </div>
                </div>
               </div>
              </form>
           </div>
          </div>
          <!-- form ends here-- >


          <!-- update form and function -->

         <div class="collapse" id="staffdetails">
         	<form class="form" style="margin:5px;padding:10px;" method="post" action="updatestaffdetails.php">
         		<div class="form-group">
         		   <div class="row">
         		   	  <div class="col-md-2" style="width:190px;padding-left:45px;">
                         <label for="staffid" style="font-size:17px;">Select Staff ID :</label>
                       </div>
                       <div class="col-md-1">
                       	<select name="sel_id">
                       	 <?php
                       	   $count="SELECT sid from staff";
                       	   $countsql=mysqli_query($connect,$count);
                       	   if(mysqli_num_rows($countsql)>0)
                       	   {
                       	     while($row=mysqli_fetch_assoc($countsql))
                       	      {   
                       	       ?>           
                       		   <option value=<?php echo $row['sid']; ?>><?php echo $row['sid']; ?></option>
                       		  <?php
                       		   }
                       		}
                       		else{
                       			 ?>
                       			 <option value="0">NULL</option>
                       			 <?php
                       	    	}
                       	  ?>
                       	</select>
                       </div>
                   </div>
                   <div class="col-md-2" style="padding-left:10px;">
                       	  <input type="submit"  class="btn btn-success" value="Submit" style="margin-left:30px;margin-top:20px;width:166px;">
                   </div>
                </div>
         	</form>
         </div>
					
	</div>

	<!-- problem tab content -->

	<div id="problem" class="tab-pane fade in" style="padding:5px;margin-top:15px;">

	  <table class="table table-hover table-bordered" style="margin-top:15px;padding:5px;background-color:#5F9EA0;table-layout: fixed;">
				<thead>
	     			<tr>
	     				<th>Complaint No.</th>
					    <th>User name</th>
					    <th>Zone</th>
			    		<th>Problem</th>
						<th>Title</th>
						<th>Date of Filing</th>
						<th>Status</th>
					</tr>
				</thead>
			   <?php
                   
                 $input=['NA','Roads Problems','Sanitation Problem','Subway Problem','Electricity Problem','Water Problem','Flyovers Problem'];
                 $zone=['NA','East Delhi','South Delhi','West Delhi','North Delhi'];
                 $status=['Pending','Approved','Solved'];
                 $statusid=['NA','Assigned'];
                 $q="SELECT complaintnumber,type,zone,title,description,timeofpublish,username,status,statusid FROM complaint INNER JOIN user ON user.uid=complaint.uid";
                 $sql=mysqli_query($connect,$q);
                   if(mysqli_num_rows($sql)>0)
                       {
                         
                         while($row=mysqli_fetch_assoc($sql))
                           {
                           ?>
                            <tbody>
							  <tr>
								<td><?php echo  $row['complaintnumber']; ?><span class="badge" style="color:black"><?php echo $statusid[$row['statusid']];?></span></td>
								<td><?php echo  $row['username']; ?></td>
								<td><?php echo  $zone[$row['zone']]; ?></td>
								<td><?php echo  $input[$row['type']];    ?></td>
								<td><?php echo  $row['title'];   ?></td>
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
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
							
							   </tr>
						     </tbody>
						     <?php
                         }
                       ?>
          </table>
         <button type="buttton" class="btn btn-primary" data-toggle="collapse" data-target="#member">
            <i class="icon-fixed-width icon-pencil"></i>Assign A staff member
          </button>

          <div class="collapse" id="member">

            <div class="well" style="height:215px; margin:20px;">

                <form class="form" style="height:40px;" method="post" action="assignstaff.php">

                  <div class="row">

                  <div class="col-md-2" id="col_2_label">
                     <label for="complaintnumber">CNO :
                      <span class="required">*</span>
                    </label>
                  </div>

                  <div class="col-md-2" id="col_2_input">
                    <input type="number" name="cno" placeholder="e.g 102" class="form-control" require>
                  </div>

                  <div class="col-md-2" id="col_2_label" style="width:155px;">
                     <label for="name" style="width:130px;">Staff Name:
                      <span class="required">*</span>
                    </label>
                  </div>

                  <div class="col-md-2" id="col_2_input">
                    <select class="form-control col-md-2" name="name">
                      
                        <option value="0">Select</option>
                          <?php
                           $count="SELECT sid,username from staff";
                           $countsql=mysqli_query($connect,$count);
                           if(mysqli_num_rows($countsql)>0)
                           {
                             while($row=mysqli_fetch_assoc($countsql))
                              {   
                               ?>           
                             <option value=<?php echo $row['sid']; ?>><?php echo $row['username']; ?></option>
                            <?php
                             }
                          }
                          else{
                             ?>
                             <option value="NULL">NULL</option>
                             <?php
                              }
                          ?>
                    </select>
                  </div>

                   <div class="col-md-2" id="col_2_label" style="width:135px;">
                     <label for="date" style="width:110px;">Deadline:
                      <span class="required">*</span>
                    </label>
                  </div>

                  <div class="col-md-2" id="col_2_input">
                    <input type="text" name="date" placeholder=" e.g 25/04/2017" class="form-control" require>
                  </div>

                </div>

                <div class="row" style="margin-top:20px;">
                   
                    <div class="col-md-2" id="col_2_label" style="width:135px;">
                       <label for="remark" style="width:110px;">Remarks:
                        <span class="required">*</span>
                      </label>
                    </div>

                    <div class="col-md-8" id="col_2_input">
                      <textarea type="text" name="remark" placeholder=" e.g Urgent !" cols="40" rows="3" class="form-control" style="width:426px;"></textarea>
                    </div>
                    


                </div>

                <input type="submit" class="btn btn-success" name="staffmember" style="margin-top:10px;width:120px;">
                    
                </form>
            </div>
          </div>
  </div>

  <!-- complaint_ department -->

   <div id="complaint_dept" class="tab-pane fade in" style="margin-top:15px;padding:30px;">
      <table class="table table-hover table-bordered" style="margin-top:15px;padding:5px;background-color:#5F9EA0;table-layout: fixed;">
				<thead>
	     			<tr>
	     				<th>Complaint No.</th>
					    <th>Staff name</th>
					    <th>Problem Assigned</th>
			    		
						<th>Deadline</th>
						<th>remark</th>
					</tr>
				</thead>
			   <?php
              
              $input=['NA','Roads Problems','Sanitation Problem','Subway Problem','Electricity Problem','Water Problem','Flyovers Problem'];
              $zone=['NA','East Delhi','South Delhi','West Delhi','North Delhi'];

                 $q="SELECT complaintnumber,username,p_assigned,remark,expected_date FROM complaint_dept
                     INNER JOIN complaint ON complaint_dept.cid=complaint.cid
                     INNER JOIN staff ON staff.sid=complaint_dept.sid";

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
								<td><?php echo  $input[$row['p_assigned']]; ?></td>
								<td><?php echo  $row['expected_date'];    ?></td>
								<td><?php echo  $row['remark'];   ?></td>
							   </tr>
						     </tbody>
                           <?php
                         }
                       }
                       else{
                       	?>
                       	<tbody>
							  <tr>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								<td><?php echo "NULL"; ?></td>
								
							
							   </tr>
						     </tbody>
						     <?php
                         }
                       ?>
          </table>  	 
      
        <form method="post" action="">
        	<input type="submit" value="Edit Details" class="btn btn-success">
        </form>
   
   </div>
   
    <!-- end of the complaint department -->

  </div>

 </div>
<script type="text/JavaScripts">
function checkPassword()
{
   pass1 = $("#pass1").val();
   pass2 = $("#pass2").val();
   if(pass1 == pass2 && pass1.length>6)
    return true;
   else{
    alert("Password should match and should be greater than 6 characters");
   return false;
  }
}
</script>
<?php include("scripts.php"); ?>
</body>
 <!-- end of body tag-- >
</html>	