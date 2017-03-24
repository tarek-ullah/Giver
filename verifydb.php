<?php


$patient_name = "" ;
$patient_status ="" ;

$patient_name = $_POST['patient_name'];
$patient_status = $_POST['vstatus'];

if($patient_status=="pending"){
  $patient_status ="verified" ;
}

$con = mysqli_connect("localhost","root","");

if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con ,"userinfo");


$patient_name = mysqli_real_escape_string($con, $patient_name);
$patient_status = mysqli_real_escape_string($con, $patient_status);


$sql = "INSERT INTO status (pname, pstatus ) 
VALUES ('$patient_name', '$patient_status')";

$query =  mysqli_query($con, $sql);

if($query)
{
  echo "<h2>Patient Added Successfull ! </h2>";

}
else 
{
  echo mysqli_error($con);
}

mysqli_close($con);




?>