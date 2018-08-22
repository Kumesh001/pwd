<!Doctype html>
<html>
<head>
<title>File Complaint</title>
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
  $(function(){
   

 
  });
  </script>
  <style>
    .text{
    	font-weight: bold;
    	font-size: 320%;
        color:black;
        padding-bottom: 20px;
    }
    .page-header{
    	margin-top: 10px;
    	background-color: #D2B48C;
      height:70px;
    }
    ul {
      padding-left: 20px;
    }
    ul li{
    	list-style-type: none;
      font-size:220%;
      width:200px;
      margin-bottom: 10px;
    }
    ul li button{
      width:200px;
    }
    ul li a:active{
      color: white;}
      ul li a:hover{
        color:white;
        background-color:transparent;
      }
      ul li a:visited{
        color: white;
      }
    #col1{
    	background-color:white;
    	margin-right: 10px;
    	margin-left: 10px;
    	margin-top: 20px;
    }
    .well{
    	margin-top:0px;
    }
    #col_2{
      padding-right: 0px;
      padding-left: 20px;
      width:80px;
      height: 30px;
      padding-bottom: 0px;
      padding-top: 5px;
    }
    #col_3{
      padding-left: 5px;
    }
    .icon{
      padding-left:25px;
      padding-top:10px; 
    }
  </style>
</head>
<body >
  <div class="page-header">
   <div class="row">
    <div class="icon col-md-1"><a href="home.php"><span class="fa fa-home fa-4x" aria-hidden="true"></span></a></div>
  	<div class="text text-center text-danger col-md-4 col-md-offset-3">File Complaint</div>
   </div>
  </div>
  <div class="container-fluid" style="background-color:blue">
    <div class="row">
       <div class="col-md-12 " style="background-color:transparent;margin-top:20px;" >
        <div class="well" style="padding-top:0px;padding-bottom:10px;width:100%;">
         <h3 style="padding-bottom:20px;">Fill the Below form to register your problem</h3>

         <!-- well start here-->
         <div class="well" id="form_well" style="box-shadow:0 0 5px; #A9A9A9">
          <!-- form -->
         <form class="form" method="post" action="submitcomplaint.php">
          <div class="form-group">
            <label for="type">Category Type(select one at a time):</label>
            <select class="form-control" name="sel_problem">
              <option value="0">Select</option>
              <option value="1">Roads Problems</option>
              <option value="2">Sanitation Problem</option>
              <option value="3">Subway Problem</option>
              <option value="4">Electricity Problem</option>
              <option value="5">Water Problem</option>
              <option value="6">Flyovers Problem</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-2" id="col_2">
             <label for="zone" style="font-size:130%;width:50px;">Zone:</label>
           </div>
           <div class="col-md-3" id="col_3">
             <select class="form-control col-md-2" name="zone_list">
              <option value="0">Select</option>
              <option value="1">East Delhi</option>
              <option value="2">South Delhi</option>
              <option value="3">West Delhi</option>
              <option value="4">North Delhi</option>
             </select>
           </div>
         </div>
         <div class="row" style="margin-top:20px;">
          <div class="col-md-2" id="col_2" style="width:140px;;">
            <label for="problem_title" style="width:120px;font-size:120%;">Problem Title:</label>
          </div>
          <div class="col-md-9">
            <input class="form-control" name="title" type="text" size="30" placeholder="Enter the title">
          </div>
         </div>
         <div class="form-group" style="padding-left:5px;margin-top:20px;">
          <label for="description" style="font-size:120%;">Problem Description:</label>
          <textarea  class="form-control" name="description" rows="5" placeholder="Please Describe your problem here.!"
         ></textarea>
         </div>
         <input value="Submit" name="submit" class="btn btn-block btn-success" type="submit" style="height:44px;font-size:180%;">
         </form>
         <!-- form closes here-->
       </div>
       <!-- well closes here-->
       </div>
       <!-- outer well closes -->
       </div>
       <!-- col-md-7 closes-->
    </div>
    <!-- row closes here-->

  </div>
<!-- last the container-fluid closes here-->
<?php include("scripts.php"); ?>
</body>
</html>