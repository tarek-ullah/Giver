<?php 

//Database query to show profile informstion
require('mysql-to-json.php') ;

session_start() ;
$patient_name = "" ;
$patient_phone ="" ;
$patient_disease ="" ;
$amount_needed = "" ;
$raised =0 ;

$myJsonData =getJSONFromDB('select patientname,diseasehistory,amountneeded from patient') ;
$jsn=json_decode($myJsonData,true);

$patient_name = $jsn[0]['patientname'] ;
$patient_disease = $jsn[0]['diseasehistory'] ;
  // $amount_needed = $jsn[0]['amountneeded'] ;

   //Query from donation table 
$myJsonData =getJSONFromDB('select * from donation') ;
$jsnDonated=json_decode($myJsonData,true);
 // print_r($jsn) ;
$given = $jsnDonated[0]['givenamount'] ;
$amount_needed = $jsnDonated[0]['totalneeded'] ;
$amount_needed = $amount_needed - $given ;


for ($i=0; $i <sizeof($jsnDonated) ; $i++) 
{
 $raised = $raised + $jsnDonated[$i]['givenamount'] ;

}  


?>


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
        <p>Already a member? the Login</a></p>

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



<!--/For Patient Profiles Showing-->

<div class="container">
  <div class="page-header">
    <h1 class="text-center">List Of Patients</h1>
  </div>
  <p class="lead text-center">Your little help can save a Patient Life</p>
  
  <div class ="section">
   <div class="container">
    <div class="row stylish-panel">
      <div class="col-md-6">
        <div>
          <img src="images/mypic.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail">
          <h2 id ="jspatientname1">  <?php echo $patient_name ?> </h2>
          <p id="jspatientdisease1"> <?php echo $patient_disease ; ?>  </p>
          <!--/col-->          
          <div class="clearfix"></div>
          <div class="col-md-4">
            <h2> <strong id = "jsamount1"> <?php echo $amount_needed ; ?> </strong></h2>
            <p>Total Amoount Needed</p>

          </div>
          <!--/col-->
          <div class="col-md-4">
            <h2 id="jsraised1"><strong><?php echo $raised ; ?> </strong></h2>
            <p>Raised So Far</p>

          </div>
          <!--/col-->
          <div class="col-md-4">
            <h2 id="jslastdonation1"><strong>43</strong></h2>
            <p>Last Donation</p>
          </div>
          <!--/col-->

        </div>
        <!--/row-->
        <form id="form" name="form">    
          <div class="form-group">
            <input type="text" class="form-control" name="givennow1" id="givennow1" placeholder="0.00">
            <label class="col-md-10 control-label"></label>
            <div class="col-lg-8"> </br>
             <button id="submit" onclick = "givenow()" type="button" class="btn btn-primary pull right "><span class="glyphicon glyphicon-thumbs-up"></span>Give Something Now</button>
           </div>
         </div> 

       </form>
     </div>
     <!--/panel-body-->

     



     <div class="col-md-6">
      <div>
        <img src="images/mypic.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail">
        <h2> MR. yyyy </h2>
        <p>suffering from y disease for the last 6 months
        </p>
        <!--/col-->          
        <div class="clearfix"></div>
        <div class="col-md-4">
          <h2><strong> 20,7K </strong></h2>
          <p>Total Amount Needed</p>

        </div>
        <!--/col-->
        <div class="col-md-4">
          <h2><strong>245k</strong></h2>
          <p>Raised so far</p>

        </div>
        <!--/col-->
        <div class="col-md-4">
          <h2><strong>43k</strong></h2>
          <p>Last Donation</p>
        </div>
        <!--/col-->

      </div>
      <!--/row-->

      <form id="form" name="form">    
        <div class="form-group">
          <input type="text" class="form-control" name="two_amount_given" id="two_amount_given" placeholder="$ 0.00"> 
          <label class="col-md-10 control-label"></label>
          <div class="col-lg-8"> </br>
           <button id="submit2" onclick = "givenow()" type="button" class="btn btn-primary pull right "><span class="glyphicon glyphicon-thumbs-up"></span>Give Something Now</button>
         </div>
       </div> 

     </form>


   </div>
   <!--/panel-body-->
 </div>
 <!--/row div closing-->
</div>
<!--/container div closing--> 
</div>
<!--/section div closing--> 


<div class ="section">
 <div class="container">
  <div class="row stylish-panel">
    <div class="col-md-6">
      <div>
        <img src="images/mypic.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail">
        <h2>MD. Rahim</h2>
        <p> suffering from x disease from the last 2 months 
        </p>
        <!--/col-->          
        <div class="clearfix"></div>
        <div class="col-md-4">
          <h2><strong> 20,7K </strong></h2>
          <p>Total Amoount Needed</p>

        </div>
        <!--/col-->
        <div class="col-md-4">
          <h2><strong>245k</strong></h2>
          <p>Raised So Far</p>

        </div>
        <!--/col-->
        <div class="col-md-4">
          <h2><strong>43k</strong></h2>
          <p>Last Donation</p>
        </div>
        <!--/col-->

      </div>
      <!--/row-->
      <form id="form" name="form">    
        <div class="form-group">
          <input type="text" class="form-control" name="two_amount_given" id="two_amount_given" placeholder="$ 0.00"> 
          <label class="col-md-10 control-label"></label>
          <div class="col-lg-8"> </br>
           <button id="submit3" onclick = "givenow()" type="button" class="btn btn-primary pull right "><span class="glyphicon glyphicon-thumbs-up"></span>Give Something Now</button>
         </div>
       </div> 

     </form>



   </div>
   <!--/panel-body-->




   <div class="col-md-6">
    <div>
      <img src="images/mypic.jpg" alt="Texto Alternativo" class="img-circle img-thumbnail">
      <h2>Mr. mmmm </h2>
      <p>suffering from blood cancer for the last 2 months 
      </p>
      <!--/col-->          
      <div class="clearfix"></div>
      <div class="col-md-4">
        <h2><strong> 20,7K </strong></h2>
        <p>Total Amount Needed</p>

      </div>
      <!--/col-->
      <div class="col-md-4">
        <h2><strong>245k</strong></h2>
        <p>Raised so far</p>

      </div>
      <!--/col-->
      <div class="col-md-4">
        <h2><strong>43k</strong></h2>
        <p>Last Donation</p>
      </div>
      <!--/col-->

    </div>
    <!--/row-->
    <form id="form" name="form">    
      <div class="form-group">
        <input type="text" class="form-control" name="givennow1" id="givennow1" placeholder="$ 0.00"> 
        <label class="col-md-10 control-label"></label>
        <div class="col-lg-8"> </br>
         <button id="submit4" onclick = "givenow()" type="button" class="btn btn-primary pull right "><span class="glyphicon glyphicon-thumbs-up"></span>Give Something Now</button>
       </div>
     </div> 

   </form>
 </div>
 <!--/panel-body-->
</div>
<!--/row div closing-->
</div>
<!--/container div closing--> 
</div>
<!--/section div closing-->

<!--Ajax call  starting-->
<!--Ajax Call to database -->
<script type="text/javascript">


  function givenow() {

    var name = document.getElementById("jspatientname1").innerHTML;
    var disease = document.getElementById("jspatientdisease1").innerHTML;
    var total = document.getElementById("jsamount1").innerHTML;
    var lastdonation = 50 ;//document.getElementById("lastdonation1").innerHTML;
   // var given = document.getElementById('submit').value ;
    var given = document.forms[2].elements[0].value;
    var raised = "" ;
    //console.log(given) ;
    total_size = total.length ;
    var donateflag="on" ;


    var dataString = 'name1=' + name  +'&given1=' + given +'&total1=' + total +'&flag1=' + donateflag ;
    
    if (given =='') {

      alert("Please enter a valid amount !!");
    } 
  else {
// AJAX code to submit form.
    $.ajax({
    type: "POST",
    url: "adddonationdb.php",
    data: dataString,
    cache: false,
    success: function(response) {
          //alert(html);
          console.log(response);
          $("#givennow1").val('');

          //document.getElementById("lastdonation1").innerHTML = lastdonation ;
             raised = lastdonation + given ;// this is wrong , need to query the total given amount 
             total = total - raised ;

             document.getElementById('jsraised1').innerHTML = raised ;
             document.getElementById('jsamount1').innerHTML = total ;
             document.getElementById('jslastdonation1').innerHTML = given ;


           }
         });
}
return false;

} 

</script>




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

  </style


</body>
</html>