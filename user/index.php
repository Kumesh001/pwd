<!Doctype html>
<html>
<!-- head start here-->
<head>
  <title>PWD Home</title>

  <meta charset="UTF-8">
  <meta name="description" content="Public wealthfare department System">
  <meta name="keywords" content="HTML, CSS, XML,Javascript">
  <meta name="author" content="umesh">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <link href="stylesheet.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css">
  <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
  
  
  <script> 
   $(document).ready(function(){
     
     $("#login").click(function(){
    
       $('.modal-title').find('p').html('Login Please');

     });
   
   });

  </script>
<style>
.required{
  color:red;
}
.text{
  color:white;
}
  .footer{
    background-color: #DCDCDC;
  }
  .navbar ul li{
     background-color:#696969;
     font-size:120%;
  }
  .navbar ul li:hover{
    background-color: #A9A9A9;
  }
</style>
</head>
<!-- head ends here-->

<!-- body start from here-->
 <body>
 <!-- navigation bar -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
    	<div class="navbar-brand" style="padding-top:0px;">
    		<span class="fa fa-home fa-3x"></span>
    	</div>
    	<div class="text" style="font-size:30px;padding-top:10px;">Public Works Department</div>
    </div>

  	<ul class="nav navbar-nav navbar-right" style="padding-right:30px;" class="loginpanel">
  		<li style="width:90px;"><a href="#formid" data-toggle="modal">Log In</a><li>
  		<li style="width:90px;"><a href="#signupid" data-toggle="modal">Sign Up</a><li>
  	</ul>
  </nav>
 <!-- nav ends here-->

<div class="container-fluid" style="background:url('images/pic.jpg');background-size:cover;height:650px;">

  <div class="content">
    <div class="text" style="font-size:80px;">WELCOME !</div>
    <div class="text" style="width:700px;font-size:25px;">Public Works Deparment is a non-profitable organisation which aims to improve the quality of service in order to makes the lifes of common people easier and convenient.
    </div>
  </div>
  
 <!-- modal ends here-->

<!-- login form start here-->
<div class="modal fade" role="dialog" id="formid"> 
  <div class="modal-dialog"> 
   <!-- content-->
   <div class="modal-content">
   	<div class="modal-header" style="background-color:#DCDCDC;">
   		<button type="button" class="close" data-dismiss="modal">&times;</button>
   		<h4 class="modal-title" style="text-align:center;font-size:180%;font-weight:bold"> Login </h4>
   	</div>

   	<!-- modal body-->
   	<div class="modal-body" style="background-color:white;height:200px;">
   		<!-- form-->
     <form style=" padding-left:95px;" method="post" action="auth.php">
 	   <div class="col-md-8" style="padding:15px;left:20px;">
         <div class="input-group" style="margin-bottom:20px;">
      	    <span class="input-group-addon" id="user"><i class="fa fa-user"></i></span>
            <input type="text" name="username" size="20" placeholder="username" class="form-control" aria-describedby="user">
         </div>
         <div class="input-group">
      	    <span class="input-group-addon" id="user"><i class="fa fa-key"></i></span>
            <input type="password" name="password" size="20" placeholder="Enter password" class="form-control" aria-describedby="password">
         </div>
         <div class="form-group" >
         <select class="form-control" name="sel_type" style="margin-top:15px;">
            <option value="0">User</option>
            <option value="1">Staff</option>
            <option value="2">Admin</option>
         </select>
    </div>
       </div>
      
    <!-- form ends -->
    </div>
    <!-- modal body ends here-->
    <div class="modal-footer" style="padding:0px;">
    		<button class="btn btn-success  btn-block" type="submit" style="height:52px;padding-top:0px;padding-bottom:0px;" value="login">
          <h3 style="margin-top:0px;margin-bottom:0px;height:26px;">Submit</h3>
        </button>
    </div>
  </form>
 </div>
 <!-- content close here-->
</div>
</div>


<!-- form for sign start here-->
<div class="modal fade" role="dialoge" id="signupid">
	<div class="modal-dialog">
		<!-- content start-->
		<div class="modal-content">
			<div class="modal-header" style="background-color:#DCDCDC;padding:0px;height:50px;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="text text-center text-success" style="font-size:40px;color:black">Sign Up Here !</div>
			</div>
			<div class="modal-body" style="height:530px;">
        <!-- form start here-->
			<form method="post" action="register.php" onsubmit="return checkPassword();">
				<div class="form-group">
					<label for="name" style="font-size:170%;text-align:right;padding-top:0px;" >Username<span class="required">*</span></label>
				    <input type="text" name="username" placeholder="like Rohan.." size="20" class="form-control" aria-describedby="name" id="name" required>
				</div>
				<div class="form-group">
					<label for="email"  style="font-size:170%;text-align:right;padding-top:0px;" >Email<span class="required">*</span></label>
				    <input type="email" name="email" placeholder="ABC@example.com" size="20" class="form-control" aria-describedby="name" id="email" required>
				</div>
				<div class="form-group">
					<label for="mobile"  style="font-size:170%;text-align:right;padding-top:0px;" >Mobile No<span class="required">*</span></label>
				    <input type="number" name="mobile" placeholder="+91-XXXXXXXXXX" size="20" class="form-control" aria-describedby="name" id="mobile" required>
				</div>

				<div class="row">
					<div class="col-md-4">
        <div class="form-group">
          <label for="address" style="font-size:170%;text-align:right;padding-top:0px;" >Address<span class="required">*</span></label>
            <input type="text" name="address" placeholder="e.g 12/12 A-block" size="40" class="form-control" aria-describedby="name" id="address"  required>
        </div>
             </div>
        <div class="col-md-4">
				<div class="form-group">
					<label for="address" style="font-size:170%;text-align:right;padding-top:0px;" >Locality<span class="required">*</span></label>
				    <input type="text" name="locality" placeholder="e.g saket" size="40" class="form-control" aria-describedby="name" id="address"  required>
				</div>
			       </div>
			       <div class="col-md-4">
				<div class="form-group">
					<label for="pincode" style="font-size:170%;text-align:right;padding-top:0px;" >PinCode<span class="required">*</span></label>
				    <input type="number" name="pincode" placeholder="e.g 110052" size="20" class="form-control" aria-describedby="name" id="pincode"  required>
				     </div>
				</div>
			</div>
			<div class="form-group">
				<label for="cityname" style="font-size:170%;text-align:right;padding-top:0px;" >City<span class="required">*</span></label>
				    <input type="text" name="city" placeholder="e.g New Delhi" size="40" class="form-control" aria-describedby="city" id="city" autocomplete="true";  required>
			</div>
			<div class="row">
					<div class="col-md-4">
				<div class="form-group">
					<label for="password" style="font-size:170%;text-align:right;padding-top:0px;" >Password<span class="required">*</span></label>
				    <input type="password" id="pass1" name="password" placeholder="Enter new Password" size="40" class="form-control" aria-describedby="name" id="pass"  required>
				</div>
			       </div>
			       <div class="col-md-8">
				<div class="form-group">
					<label for="confirm" style="font-size:170%;text-align:right;padding-top:0px;" >Confirm-Password<span class="required">*</span></label>
				    <input type="password" id="pass2" name="confirm_password" placeholder="Confirm Your password" size="20" class="form-control" aria-describedby="name" id="repass"  required>
				     </div>
				</div>
			</div>
		
		    </div>
		    <div class="modal-footer">
		    	<input type="submit" value="Sign up" name="signup" class="btn btn-success btn-block" style="height:54px;">
		    </div>
		</div>
      </form>
      <!-- form closes here -->
	</div>
</div>

</div>
  
<footer class="footer">
  <div class="text text-danger text-center" style="font-size:250%;color:black;">Copyright@Protected</div>
</footer>
<script type="text/javascript">
function checkPassword(){
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
</html>