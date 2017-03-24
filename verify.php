<?php 

//Database query to show profile informstion
require('mysql-to-json.php') ;

session_start() ;
$patient_name = "" ;
$patient_phone ="" ;
$patient_disease ="" ;
$amount_needed = "" ;

$myJsonData =getJSONFromDB('select patientname,diseasehistory,amountneeded from patient') ;
$jsn=json_decode($myJsonData,true);

$patient_name = $jsn[0]['patientname'] ;
$patient_disease = $jsn[0]['diseasehistory'] ;
$amount_needed = $jsn[0]['amountneeded'] ;

   //Query status db 

$myJsonData =getJSONFromDB('select patientname,diseasehistory,amountneeded from patient') ;
$jsnStatus=json_decode($myJsonData,true);




?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>GIVER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   <!--Send data for verification-->
   <script type="text/javascript">

     function verify() {

       var patient_name = document.getElementById("name1").innerHTML;
       var vstaus = document.getElementById("status1").innerHTML;


       var dataString = '&patient_name=' + patient_name + '&vstatus=' +vstaus   ;

       if ( vstaus == "verified" ) {

         alert("This patient is already verified !!");
       } 
       else {
            // AJAX code to submit form.
            $.ajax({
             type: "POST",
             url: "verifydb.php",
             data: dataString,
             cache: false,
             success: function(response) {
          //alert(html);
          console.log(response);
          document.getElementById("status1").innerHTML ="verified" ;
          
        }
      });
          }
          return false;

        }

      </script>
      <!--Modal launch-->
      <script>
        $(document).ready(function(){
          $("#myBtn").click(function(){
            $("#myModal").modal();
          });
        });
      </script>

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
    <span class ="icon-bar"></span>
    <span class ="icon-bar"></span>
  </button>
  
  <!-- <a class = "navbar-brand" href = "patients.php">Giver</a>-->
  <li> <a href="profile-admin.php"> <img src="images/logo.png" alt="logo"  ></a> </li>
</div>

<div class = "collapse navbar-collapse" id = "example-navbar-collapse">
	
  <ul class = "nav navbar-nav navbar-right">
   <li><a href = "patients.php">Patients</a></li>
   <li> <a href="about.php">About Us</a> </li>
   <li> <a href="profile-admin.php">Dashboard </a>
    
    
    
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






<!--/For Patient Profiles Showing-->

<div class="container">
  <div class="page-header">
    <h1 class="text-center">Verification Requests</h1>
  </div>
  <p class="lead text-center">Your little help can save a Patient Life</p>
  
  <div class ="section">
   <div class="container">
    <div class="row stylish-panel">
      <div class="col-md-6">
        <div>
          <img src="images/mypic.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail">
          <h2 id="name1">
            <?php 
            echo $patient_name ;
            ?>
          </h2>
          <p><?php 
            echo $patient_disease ;

            ?>
          </p>
          <!--/col-->          
          <div class="clearfix"></div>
          <div class="col-md-3">
            <h2><strong> <?php 

             echo $amount_needed ;
             ?>
           </strong></h2>
           <p>Total Amoount Needed</p>
           
         </div>
         <!--/col-->
         <div class="col-md-3">
          <h2 id="status1">pending</h2>
          <p>Verification Status</p>

        </div>
        
        <!--/col-->
      </div>
      <!--/row-->
      <button type="button" id ="verify"  onclick ="verify()" class="btn btn-primary " title="Click To Donate"><span class="glyphicon glyphicon-thumbs-up"> </span>Verify</a>                                                  
      </div>
      <!--/panel-body-->
      
      
      
      <?php
      
      $patient_name2 ="" ;
      $patient_disease2="";
      $amount_needed2="";

      for($i=1;$i<2;$i++)
      {

        if ( ( $patient_name != $jsn[$i]['patientname'] ) ||   ($patient_disease!=  $jsn[$i]['patient_disease'] ) || ($amount_needed != $jsn[$i]['amountneeded'] )  )
        {

          $patient_name2 = $jsn[$i]['patientname'] ;
          $patient_disease2 = $jsn[$i]['diseasehistory'] ;
          $amount_needed2 = $jsn[$i]['amountneeded'] ;
        }
      }

      ?>
      <div class="col-md-6">
        <div>
          <img src="images/mypic.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail">
          <h2 ><?php echo $patient_name2 ?></h2>
          <p>
            <?php echo  $patient_disease2 ?>
          </p>
          <!--/col-->          
          <div class="clearfix"></div>
          <div class="col-md-3">
            <h2><strong> <?php echo $amount_needed2  ?> </strong></h2>
            <p>Total Amount Needed</p>
            
          </div>
          <!--/col-->
          <div class="col-md-3">
            <h2 id ="status"><strong>pending</strong></h2>
            <p>Verification Status</p>

          </div>
          <!--/col-->
        </div>
        <!--/row-->
        <button type="button" id="verify" onclick="verify_patient()" class="btn btn-primary " title="Click To Donate"><span class="glyphicon glyphicon-thumbs-up"></span>Verify</a>
        </div>
        <!--/panel-body-->
      </div>
      <!--/row div closing-->
    </div>
    <!--/container div closing--> 
  </div>
  <!--/section div closing-->





  <!--/simple animation for profile pictures-->  

  <style type ="text/css">

    .stylish-panel {
      padding: 20px 0;
      text-align: center;
    }
    .stylish-panel > div > div{
      padding: 10px;
      border: 1px solid transparent;
      border-radius: 4px;
      transition: 0.2s;
    }
    .stylish-panel > div:hover > div{
      margin-top: -10px;
      border: 1px solid rgb(200, 200, 200);
      box-shadow: rgba(0, 0, 0, 0.1) 0px 5px 5px 2px;
      background: rgba(200, 200, 200, 0.1);
      transition: 0.5s;
    }

    .stylish-panel > div:hover img {
      border-radius: 50%;
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      transform: rotate(360deg);
    }

  </style>

  <!--Log Out Modal -- >




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
        
        <button type="button" onclick="logout()" id ="logoutbtn" class="btn btn-danger btn-primary pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-off"></span> Log Out</button>

        <p>Wrong Decision? <a href="profile-admin.php">Stay</a></p>
        
      </div>
    </div>
    
  </div>

  

  <!--SCRIPT FOR MODAL -->
  <script>
    $(document).ready(function(){
      $("#myLogoutBtn").click(function(){
        $("#myLogoutModal").modal();
      });
    });


  </script>



</body>

</html>