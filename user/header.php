<?php 
$name= $_SESSION['username'];
$id=$_SESSION['uid'];
?>

<nav class="navbar navbar-default navbar-fixed-top" style="height:70px;">
		<div class="navbar-header" style="width:200px;height:70px;">
			<div class="navbar-brand" style="padding-top:10px;">
				<a href="home.php"><img src="images/pwdlogonew.png" alt="logo" height="55px;" width:"150px;"></a>
			</div>
		</div>
		<form class="navbar-form" action="search.php" method="get">
			<div class="col-md-6" style="height:25px;margin-top:20px;">
           <div class="input-group">
           	<input type="text" name="search" placeholder="search by date,locality,pincode or complaint number" id="search" style="width:454px;height:36px;background-color:#B0E0E6;color:black;">
            
            <span class="input-group-addon" style="width:70px;">
              <button type="submit" name="searchme" class="btn btn-success" style="padding-bottom:0px;padding-top:0px;width:46px;;">
           	     <span class="fa fa-search " aria-hidden="true"></span>
               </button>
            </span>
           </div>
       </div>
         <!-- closing here-->
       </form>
       <div class="navbar-btn col-md-2">
        <button class="btn btn-primary" type="button" style="margin-top:10px;"><?php echo $name; ?></button>
      </div>
      <div class="col-md-1" style="margin-top:15px;padding-right:0px;padding-left:0px;width:40px;" class="cog-icon">
        <a href="#" class="" class="btn dropdown-toggle" data-toggle="dropdown" style="padding-left:0px;padding-right:0px;padding-top:6px;padding-down:0px;">
          <i class="fa fa-cog fa-2x" aria-hidden="true"></i>
        </a>
         <ul class="dropdown-menu" style="height:42px; width:122px;">
            <li style="padding:0px;background-color:#ffffff;"><a href="#profile" data-toggle="modal"><p style="color:black"><i class="fa fa-fw fa-user"></i>Profile</p></a></li>
            <li style="padding:0px;background-color:#ffffff;"><a href="#"><p style="color:black"><i class="fa fa-fw fa-envelope"></i>Inbox</p></a></li>
           <!-- <li class="divider" style="width:5px;padding:0px;color:black;margin:0px;border-bottom:2px solid grey;"></li>-->
            <li style="padding:0px;background-color:#ffffff;"><a href="logout.php"><p style="color:black"><i class="fa fa-fw fa-power-off"></i>Logout</p></a></li>
         </ul>
      </div> 
	</nav>

<!-- login form start here-->
<div class="modal fade" role="dialog" id="profile"> 
  <div class="modal-dialog"> 
   <!-- content-->
   <div class="modal-content">
    <div class="modal-header" style="background-color:#DCDCDC;">
      <button type="button" class="close" data-dismiss="modal" style="width:20px;">&times;</button>
      <h4 class="modal-title" style="text-align:center;font-size:200%;font-weight:bold;padding-left:20px;margin-left:10px;"> User Profile</h4>
    </div>

    <!-- modal body-->
    <div class="modal-body" style="background:url('images/pic2.jpg');height:400px;">
      <?php
         include "database.php";
          $q="SELECT * FROM user
              WHERE uid='$id'";
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
                       <h3><?php echo $row['mobile']; ?></h3>
                    </div>
                  </div>
                 <div class="row">
                    <div class="col-md-3" id="coo_3"  style="margin-left:70px;padding-top: 25px;padding-left:55px;width:170px;">
                      <label for="number" style="font-size:20px;">Address:</label>
                    </div>
                    <div class="col-md-4">
                       <h3><?php echo $row['address'].', <br>'.$row['city'].', <br>'.$row['pincode']; ?></h3>
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
