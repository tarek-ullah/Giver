<?php

session_start() ; 
header("Location:base.php") ;

$_SESSION['member_name'] = "" ;
$_SESSION['member_email'] = "" ;
$_SESSION['member_password'] = "" ;

//echo "Logged out !!"
session_destroy() ;



?>