<!DOCTYPE html>
<html lang="en">
<head>
  <title>Giver</title>
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
  
  <!--  <a class = "navbar-brand" href = "base.php">Giver</a> -->
  <li> <a href="base.php"> <img src="images/logo.png" alt="logo"  ></a> </li>
</div>

<div class = "collapse navbar-collapse" id = "example-navbar-collapse">
	
  <ul class = "nav navbar-nav navbar-right">
    
   <li><a href = "patients.php">Patients</a></li>
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
        <p>Already a member? then Login</a></p>
        <p>Forgot <a href="#">Password?</a></p>
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
<!--start of emergency patient profiles-->

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center text-primary">Team</h1>
        <p class="text-center">We are a small team based on Dhaka </p>
      </div>
    </div>
  </br> </br>
  <div class="row">
    <div class="col-md-4">
      <img src="images/mypic.jpg"
      class="center-block img-circle img-responsive">
      <h3 class="text-center">Tarek Ullah</h3>
      <p class="text-center">Developer</p>
    </div>
    <div class="col-md-4">
      <img src="images/mypic2.jpg"
      class="center-block img-circle img-responsive">
      <h3 class="text-center">Shuvo</h3>
      <p class="text-center">Developer</p>
    </div>
    <div class="col-md-4">
      <img src="images/mypic.jpg"
      class="center-block img-circle img-responsive">
      <h3 class="text-center">H. M.</h3>
      <p class="text-center">Developer</p>
    </div>
  </div>
</div>
</div>
