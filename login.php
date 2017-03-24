<?php

require('mysql-to-json.php') ;

session_start() ;
$usernameforlogin ="" ;
$passwordforlogin="" ;
$loggedin =false ;
$adminflag = false ;

$myJsonData =getJSONFromDB('select * from auth') ;
$jsn=json_decode($myJsonData,true);

if( ( isset($_POST['login_username']) ) && ( !empty($_POST['login_username'] )  ) && 
	( isset($_POST['login_password']) ) && ( !empty($_POST['login_password'] ) ) )
{

	$usernameforlogin = $_POST['login_username'] ;
	$passwordforlogin =$_POST['login_password'] ;
	$passwordforlogin = md5($passwordforlogin) ;


}

$_SESSION['userprofilename'] =$usernameforlogin ;

for($i=0;$i<sizeof($jsn);$i++)
{
	if (  ( $jsn[$i]['username']== $usernameforlogin) && ($jsn[$i]['password']==$passwordforlogin) )
	{
		$loggedin = true ;

	}
}

  //Associative array to differentiate between admin and others users
$adminpassword = "13241902" ;
$adminpassword_root = md5($adminpassword) ;

$admin = array("Tarek Ullah"=>$adminpassword_root, "tarek"=>"007007") ; 

if($loggedin){
	// echo "<h2>Welcome member </h2> " ;

	foreach($admin as $x => $x_value)
	{
		if( ( $x == $usernameforlogin) && ( $x_value == $passwordforlogin) )
		{
			$adminflag = true ;
		}
	}
	if($adminflag)
	{
      //echo $_SESSION['userprofilename'] ;
		header("Location:profile-admin.php");
	}
	else
	{
		header("Location:profile-others.php");
	}
} 

if(!$loggedin)
{
	echo "<h2> Icorrect username or password </h2>" ;
} 

?>