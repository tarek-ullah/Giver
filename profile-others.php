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
    <span class = "sr-only">Toggle navigation</span>
    <span class = "icon-bar"></span>
    <span class = "icon-bar"></span>
    <span class = "icon-bar"></span>
  </button>
  
  <!-- <a class = "navbar-brand" href = "base.php">Giver</a> -->
  <li> <a href="base.php"> <img src="images/logo.png" alt="logo"  ></a> </li>
</div>

<div class = "collapse navbar-collapse" id = "example-navbar-collapse">
  
  <ul class = "nav navbar-nav navbar-right">
   <li><a href = "patients.php">Patients</a></li>
   <li> <a href="about.php">About Us</a> </li>

   <!-- log out  buttons to trigger log out  modal -->
   <button type="button" class="btn btn-default btn-lg" id="myLogoutBtn">Log Out</button>
   
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

<h1> Welcome !!  </h1> 


<div class="container" style="padding-top: 60px;">
  <h1 class="page-header">
   <?php
   session_start() ;
   echo $_SESSION['userprofilename'] ; 
   ?>
 </h1>

</h1>
<div class="row">
  <!-- left column -->
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="text-center">
      <img src="https://s-media-cache-ak0.pinimg.com/originals/c2/c0/85/c2c0854e6113a918a4a00b834add7421.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
      <h6>Upload a different photo...</h6>
      <input type="file" class="text-center center-block well well-sm">
    </div>
  </div>
  <!-- edit form column -->
  <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
    <div class="alert alert-info alert-dismissable">
      <a class="panel-close close" data-dismiss="alert">×</a> 
      <i class="fa fa-coffee"></i>
      Please    <strong>Add Patients Carefully </strong>
    </div>
    
    
    <div class ="col-md-2">
      <!--/row-->
      <a href="addpatient.php" class="btn btn-primary " title="Click To Add a Patient">Add Patients</a>
    </div>
    <div class="col-md-6 pull-right">
      <h4 id="admininfo">Personal Info :</h4>
      
    </div>

  </div>
</form>
</div>
</div>
</div>

<!--/col-->          
<div class="clearfix"></div>
<div class=" col-md-2">
  <h2><strong> 20,7K </strong></h2>
  <p>Total Amount Donated</p>
  
</div>
<!--/col-->
<div class=" col-md-2">
  <h2><strong>245k</strong></h2>
  <p>Patients have been helped</p>

</div>
<!--/col-->
<div class=" col-md-2">
  <h2><strong>43k</strong></h2>
  <p>Biggest donation so far</p>
</div>
<!--/col-->
</div>
<!--/row-->
</div>
<!--/panel-body-->
</div>
<!--/panel-->
</div>
<!--/col--> 
</div>
<!--/row--> 
</div>
<!--/container-->





<!-- Modal For Logout -->
<div class="modal fade" id="myLogoutModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal For Logout content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> Logout</h4>
      </div>
      <div class="modal-body" style="padding:40px 50px;"><span class="glyphicon glyphicon-alert"></span>   <h3>Do you really want to log out ? </h3> </label>
      </div>
    </br> 
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary  pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      
      <button type="button" id ="logoutbtn" class="btn btn-danger btn-primary pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Log Out</button>

      <p>Wrong Decision? <a href="profile-admin.php">Stay</a></p>
      
    </div>
  </div>
  
</div>

<script type="text/javascript">

 var btn = document.getElementById('logoutbtn');
 btn.onlclick = function() {
   document.location.href = '<?php header("Location:base.php"); ?> ' ;

   <?php 
   session_start() ;
   $_SESSION['member_name'] ="" ;
   $_SESSION['member_email'] ="" ;
   $_SESSION['member_password'] ="" ;

   ?>    

 } ;

</script>

<!--SCRIPT FOR MODAL -->
<script>
  $(document).ready(function(){
    $("#myLogoutBtn").click(function(){
      $("#myLogoutModal").modal();
    });
  });


  </script


</body>



</html>