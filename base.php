<!DOCTYPE html>
<html lang="en">
<head>
  <title>GIVER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
</head>
<body>


  <nav class = "navbar navbar-inverse" role = "navigation">
   
   <div class = "navbar-header">
    <button type = "button" class = "navbar-toggle" 
    data-toggle = "collapse" data-target = "#example-navbar-collapse">
    <span class = "sr-only"></span>
    <span class = "icon-bar"></span>
    <span class = "icon-bar"></span>
    <span class = "icon-bar"></span>
  </button>
  
  <!-- <a class = "navbar-brand" href = "base.php">GIVER</a> -->
  <li> <a href="base.php"> <img src="images/logo.png" alt="logo"  ></a> </li>
</div>

<div class = "collapse navbar-collapse" id = "example-navbar-collapse">
	
  <ul class = "nav navbar-nav navbar-right">
   <li><a href = "patients.php">Patients</a></li>
   <li> <a href="about.php">About Us</a> </li>
   <!-- log in and sign up buttons to trigger modals -->
   <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>
   <button type="button" class="btn btn-default btn-lg" id="myBtnSign">Sign Up</button>
   
 </li>
 
</ul>
</div>

</nav>
<style type="text/css">
	.btn-default{
		color: white;
		background-color: #1D1A19;
	}


</style>

<!-- Modal For Login -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal For Login content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
      </div>
      <div class="modal-body" style="padding:40px 50px;">

        <form action="login.php" method="POST" role="form" class="form-horizontal">
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
            <input type="text" class="form-control" name= "login_username" id="usrname" placeholder="Enter user name " required>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
            <input type="text" class="form-control" name="login_password" id="psw" placeholder="Enter password" required>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="" checked>Remember me</label>
          </div>
          <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <p>Not a member? then Sign Up</a></p>
        <p>Forgot <a href="#">Password?</a></p>
      </div>
    </div>
    
  </div>
</div> 
</div>

<script>
  $(document).ready(function(){
    $("#myBtn").click(function(){
      $("#myModal").modal();
    });
  });
</script>
<!--Modal for Sign Up -->
<!-- Modal -->
<div class="modal fade" id="myModalSign" role="dialog">
  <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
      </div>

      <div class="modal-body" style="padding:40px 50px;">

        <form action="authentication.php" method="POST" role="form" class="form-horizontal">

          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
            <input type="text" class="form-control" name="username" id="usrname" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
            <input type="text" class="form-control" name="password" id="psw" placeholder="Enter password" required>
          </div>

          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>Confirm Password</label>
            <input type="text" class="form-control" name="conpassword" id="psw" placeholder="Enter Confirm password" required>
          </div>

          <div class="form-group">
            <label for="email"><span class="glyphicon glyphicon-user"></span> Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" required>
          </div> </br>
          <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Sign Up</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        <p>Already a member? then  Login</a></p>
        
      </div>
    </div>
    
  </div>
</div> 
</div>

<script>
  $(document).ready(function(){
    $("#myBtnSign").click(function(){
      $("#myModalSign").modal();
    });
  });
</script>


<!--Carousel start -->

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="images/HarryPotter.jpg" alt="GIVER QUOTE"  >
        <div class="carousel-caption">
          <h1>Giver</h1>
          <p>Be a Giver , make a difference </p>
        </div>
      </div>

      <div class="item">
        <img src="images/rich.jpg" alt="GIVER" >
        <div class="carousel-caption">
          <h3>Giver</h3>
          <p>Your one decision can save a life </p>
        </div>
      </div>

      <div class="item">
        <img src="images/child.jpg" alt="Everyone deserves to live happily" >
        <div class="carousel-caption">
          <h3>Giver</h3>
          <p>Everyone deserves to live happily</p>
        </div>
      </div>
      
      
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!--carousel end-->






<!--Query to show the recent donations -->
<?php 

//Database query to show profile informstion
require('mysql-to-json.php') ;

$patient_name1 = "" ;
$amount1 = "" ;
$patient_name2 = "" ;
$amount2 = "" ;
$patient_name3 = "" ;
$amount3 = "" ;

$myJsonData =getJSONFromDB('select * from donation ORDER BY date_now') ;
$jsn=json_decode($myJsonData,true);


$patient_name1 = $jsn[0]['patientname'] ;
$amount1 = $jsn[0]['givenamount'] ;  
$patient_name2 = $jsn[1]['patientname'] ;
$amount2 = $jsn[1]['givenamount'] ; 
$patient_name3 = $jsn[2]['patientname'] ;
$amount3 = $jsn[2]['givenamount'] ;      



?>



<!--start of recent donation history-->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center text-primary">Recent Donations</h1>
        <p class="text-center"> Recent Donations Received </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-8 patient-info">
        <div class="alert alert-info alert-dismissable">
          
          <i class="fa fa-coffee"></i>
          <h4 id="recentdonation1" > <strong> <?php echo $patient_name1." "."has just Received  ".$amount1." taka" ?> </strong>  </h4>
        </div>   
      </div>

      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-8 patient-info">
          <div class="alert alert-info alert-dismissable">
            
            <i class="fa fa-coffee"></i>
            <h4 id="recentdonation2" > <strong> <?php echo $patient_name2." "."has just Received  ".$amount2." taka" ?> </strong>  </h4>
          </div>   
        </div>

        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-8 patient-info">
            <div class="alert alert-info alert-dismissable">
              
              <i class="fa fa-coffee"></i>
              <h4 id="recentdonation3" > <strong><?php echo $patient_name3." "."has just Received  ".$amount3." taka" ?> </strong>  </h4>
            </div>   
          </div>

        </div>
      </div>
      

    </body>

  </br> </br> </br>



  <!--footer -->

  <footer class="footer">
    
   

   <div class="container text-center">
     <h4> Catch us on Social Media </h4> 
     <h3> <a href="www.facebook.com"><i class="fa fa-facebook">Facebook</i></a>
      <a href="www.twitter.com">Twitter<i class="fa fa-twitter">Twitter</i></a>
      <a href="#"><i class="fa fa-linkedin">Linked in</i></a>
      <a href="#"><i class="fa fa-google-plus">Google Plus</i></a>
      <a href="#"><i class="fa fa-skype"></i>Skype</a> </h3>
    </div><!--End container-->
  </footer><!--End footer 2-->


  <!--footer css-- >
  <style type="text/css">
    .footer {
      background: #061D25;
      padding: 10px 0;
    }

    .footer a {
      color: #70726F;
      font-size: 20px;
      padding: 10px;
      border-right: 1px solid #70726F;
      -webkit-transition: all .5s ease;
      transition: all .5s ease;
    }

    .footer a:first-child {
      border-left: 1px solid #70726F;
    }

    .footer a:hover {
      color: white;
      -webkit-transition: all .5s ease;
      transition: all .5s ease;
    }

  </style>





  </html>