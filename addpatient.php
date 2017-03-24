<<!DOCTYPE html>
<html>
<head>
	<title>GIVER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<script type="text/javascript">

		function myFunction() {

			var patient_name = document.getElementById("patient_name").value;
			var patient_phone = document.getElementById("patient_phone").value;
			var patient_disease = document.getElementById("patient_disease").value;
			var patient_addedby = document.getElementById("patient_addedby").value;
			var patient_addedby_password = document.getElementById("patient_addedby_password").value ;
			var amount_needed = document.getElementById("amount_needed").value ;

			var dataString = 'patient_name=' + patient_name + '&patient_phone=' + patient_phone + '&patient_disease=' + patient_disease + '&patient_addedby=' + patient_addedby +'&patient_addedby_password=' + patient_addedby_password + '&amount_needed=' + amount_needed  ;

			if (patient_name == '' || patient_phone == '' || patient_disease == '' || patient_addedby == '' || patient_addedby_password == ''
				|| amount_needed =='') {

				alert("Please Fill All Fields");
				} 
			else {
				// AJAX code to submit form.
				$.ajax({
				type: "POST",
				url: "addpatientdatabase.php",
				data: dataString,
				cache: false,
				success: function(response) {
					//alert(html);
					console.log(response);
					document.getElementById("notification").innerHTML ="The Profile of"+ " " + patient_name + " " + "has been sent for verification Successfully !!" ;
					$("#patient_name").val('');
					$("#patient_phone").val('');
					$("#patient_disease").val('');
					$("#patient_addedby").val('');
					$("#patient_addedby_password").val('');
					$("#amount_needed").val('');

					}
				});
			}
		return false;

		}

	</script>

<!--Log Out Script-->
<script type="text/javascript">
	function logout(){
		window.location.href ="base.php" ;
	}
	
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
		
		<!-- <a class = "navbar-brand" href = "base.php">Giver</a> -->
		<li> <a href="profile-admin.php"> <img src="images/logo.png" alt="logo"  ></a> </li>
	</div>

	<div class = "collapse navbar-collapse" id = "example-navbar-collapse">

		<ul class = "nav navbar-nav navbar-right">
			<li><a href = "patients.php">Patients</a></li>
			<li> <a href="about.php">About Us</a> </li>
			<li> <a href="profile-admin.php">Dashboard </a> </li>

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



<div class="container" style="padding-top: 60px;">
	<h1 class="page-header">Add A Patient Profile</h1>
	<div class="row">
		<!-- left column -->
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="text-center">
				<img src="images/mypic.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
				<h6>Upload the Patient photo...</h6>
				<input type="file" class="text-center center-block well well-sm">
			</div>
		</div>
		<!-- edit form column -->
		<div class="col-md-8 col-sm-6 col-xs-12 patient-info">
			<div class="alert alert-info alert-dismissable">
				<a class="panel-close close" data-dismiss="alert">×</a> 
				<i class="fa fa-coffee"></i>
				<h4 id="notification" > You <strong>must send verify request</strong> to add a patient </h4>
			</div>
			<h3>Patient info</h3>

			<form id="form" name="form" role="form" class="form-horizontal">

				<div class="form-group">
					<label class="col-lg-3 control-label">Patient name</label>
					<div class="col-lg-8">
						<input class="form-control" id ="patient_name" name="patient_name" placeholder="patient Full Name" type="text" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Phone:</label>
					<div class="col-lg-8">
						<input class="form-control" id="patient_phone" name="patient_phone" placeholder="patient phone number" type="text" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Disease History</label>
					<div class="col-lg-8">
						<input class="form-control"  id="patient_disease" name= "patient_disease" placeholder="Disease History" type="text" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Amount Needed</label>
					<div class="col-lg-8">
						<input class="form-control" id="amount_needed" name="amount_needed" placeholder="Total Amount needed to Complete the treatment" type="text" required>
					</div>
				</div>

			</div>
			<div class="form-group">
				<label class="col-md-10 control-label">Username</label>
				<div class="col-md-5">
					<input class="form-control" id= "patient_addedby" name="patient_addedby" placeholder="Your Name" type="text" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-10 control-label">Password</label>
				<div class="col-md-5">
					<input class="form-control" id="patient_addedby_password" name="patient_addedby_password" placeholder="Your Password" type="password" required>
				</div>
			</div>

		</br> </br>


		<div class="form-group">
			<label class="col-md-10 control-label"></label>
			<div class="col-lg-8"> </br>
				<button id="submit" onclick = "myFunction()" type="button" class="btn btn-success pull right "><span class="glyphicon glyphicon-off"></span>Send Verify Request</button>
			</div>
		</div> 

	</form>
</div>
</div>
</div>


<!--- Modal for log out button -->



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


	</script





</body>
</html>