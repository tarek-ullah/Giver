
<?php
  //echo $_POST['username'];
  //echo $_POST[]
session_start() ;

$user_name ="" ;
$user_email="" ;
$user_password ="" ;
$user_conpassword ="" ;

if( ( isset($_POST['username']) && !empty($_POST['username'] ) ) && 
  ( isset($_POST['email']) && !empty($_POST['email'] ) ) &&
  ( isset($_POST['password']) && !empty($_POST['password'] ) ) &&
  ( isset($_POST['conpassword']) && !empty($_POST['conpassword'] ) ) )

{
        // Form Submited

 $user_name = $_POST['username'];
 $user_email = $_POST['email'];
 $user_password = $_POST['password'];
 $user_conpassword =$_POST['conpassword'] ;    

}

if (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL))
{
  echo "<h2> Invalid E-mail format </h2>" ;
}
else
{

  if( $user_password == $user_conpassword )
  {

   $user_password =md5($user_password) ;
   $con = mysqli_connect("localhost","root","");

   if (!$con)
   {
    die('Could not connect: ' . mysql_error());
  }

  mysqli_select_db($con ,"userinfo");


  $user_name = mysqli_real_escape_string($con, $user_name);
  $user_email = mysqli_real_escape_string($con, $user_email);
  $user_password = mysqli_real_escape_string($con , $user_password);


       //  $sql = "INSERT INTO auth (username, email, password)
        // VALUES ($user_name, $user_email, $user_password )";
  $sql = "INSERT INTO auth (username, email, password) VALUES ('$user_name', '$user_email', '$user_password')";
  echo $sql;
  $query =  mysqli_query($con, $sql);
  
  if($query)
  {
             //echo "Registration Successfull ! ";
   

    
    $_SESSION['member_name'] = $user_name ;
    $_SESSION['member_email'] =$user_email ;
    $_SESSION['member_password'] =$user_password ;

    header("Location:base.php") ;

  }
  else {
    echo mysqli_error($con);
  }
  
  mysqli_close($con);

}

}

?>