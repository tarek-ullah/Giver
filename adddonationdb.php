<?php


session_start() ;

$given = "" ;
$patient_name ="";
$needed = "" ;
$given_by="";


$patient_name = $_POST['name1'] ;
$given = $_POST['given1'] ;
$needed = $_POST['total1'] ;
$flag =$_POST['flag1'] ;


if($_SESSION['member_name'] == "")
{
	$given_by = "Anonymous" ;
}
else
{
	$given_by = $_SESSION['member_name'] ;
}
   //storing data to donation database 
$con = mysqli_connect("localhost","root","");

if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con ,"userinfo");


$patient_name = mysqli_real_escape_string($con, $patient_name);
$given = mysqli_real_escape_string($con, $given);
$needed = mysqli_real_escape_string($con , $needed);


settype($given, "string") ;
$now =  date("Y-m-d h:i:sa") ;
$now = mysqli_real_escape_string($con, $now) ;



       //  $sql = "INSERT INTO auth (username, email, password)
        // VALUES ($user_name, $user_email, $user_password )";
$sql = "INSERT INTO donation (patientname, givenamount,totalneeded,givenby,date_now) 
VALUES ('$patient_name', '$given', '$needed' ,'$given_by','$now')";
        //echo $sql;
$query =  mysqli_query($con, $sql);

        //Updating total value 
$given = (double)$given ;
$needed = (double)$$needed ;

$needed_updated = $needed - $given ;
$needed_updated = (string)$needed_updated ;

$sql_update = "UPDATE donation SET totalneeded=$needed_updated WHERE patientname= $patient_name " ;
        //echo $sql;

$query_update =  mysqli_query($con, $sql_update);


if($query && $query_update)
{
             //echo "donation Successfull ! ";
	

}
else {
	echo mysqli_error($con);
}

mysqli_close($con);






?>