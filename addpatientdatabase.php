<?php

$patient_name = "" ;
$patient_phone ="" ;
$patient_disease ="" ;
$patient_addedby ="" ;
$patient_addedby_password ="" ;
$amount_needed ="" ;


   //if(isset($_POST['patient_name']) && !empty($_POST['patient_phone']) && !empty($_POST['patient_disease'] )&& !empty($_POST['patient_addedby']))
    //{
        // Form Submited

$patient_name = $_POST['patient_name'];
$patient_phone = $_POST['patient_phone'];
$patient_disease = $_POST['patient_disease'];
$patient_addedby =$_POST['patient_addedby'] ;
$patient_addedby_password = $_POST['patient_addedby_password'] ;    
$amount_needed = $_POST['amount_needed'] ; 
 // }
     //echo $patient_name ;
echo $amount_needed;

$patient_addedby_password = md5($patient_addedby_password);


$con = mysqli_connect("localhost","root","");

if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con ,"userinfo");


$patient_name = mysqli_real_escape_string($con, $patient_name);
$patient_phone = mysqli_real_escape_string($con, $patient_phone);
$patient_disease = mysqli_real_escape_string($con , $patient_disease);
$patient_addedby = mysqli_real_escape_string($con , $patient_addedby) ;
$amount_needed = mysqli_real_escape_string($con , $amount_needed) ;


       //  $sql = "INSERT INTO auth (username, email, password)
        // VALUES ($user_name, $user_email, $user_password )";
$sql = "INSERT INTO patient (patientname, patientphone,diseasehistory,addedby,amountneeded ) 
VALUES ('$patient_name', '$patient_phone', '$patient_disease' ,'$patient_addedby', '$amount_needed')";
        //echo $sql;
$query =  mysqli_query($con, $sql);

if($query)
{
 echo "<h2>Patient Added Successfull ! </h2>";

}
else {
  echo mysqli_error($con);
}

mysqli_close($con);




?>