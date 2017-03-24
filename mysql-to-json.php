<?php

function getJSONFromDB($sql){
	
   //echo $sql ; 
	$conn = mysqli_connect("localhost","root","","userinfo") ;
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);


}

?>