<?php

$name=$_POST['name'];
$mail=$_POST['mail'];
$cont=$_POST['phone']; 
$message=$_POST['message'];


if(!empty($name) || !empty($mail) || !empty($cont)){	
$host="localhost";
$dbusername="root";
$dbpassword="123456789";
$dbname="reg1";	
$con = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if(mysqli_connect_error()){
	die('CONNECT ERROR ('.mysqli_connect_error().')'
	.mysqli_connect_error());
}
else{
	$SELECT = "SELECT mail from portfoliodetails where mail = ? Limit 1";
	$INSERT = "INSERT into portfoliodetails (name, mail, phone,message) values (?, ?, ?,?)";
	
	$stmt = $con->prepare($SELECT);
	$stmt->bind_param("s", $mail);
	$stmt->execute();
	$stmt->bind_result($mail);
	$stmt->store_result();
	$rnum = $stmt->num_rows;
	
	if($rnum==0){
		$stmt->close();
		$stmt = $con->prepare($INSERT);
		$contact = $con->real_escape_string($cont);
		$stmt->bind_param("ssds", $name,$mail,$contact,$message);
		$stmt->execute();
		echo "<script>alert('Contact saved');</script>";
		
	}else{
		echo "<script>alert('');</script>";
		
	}
	$stmt->close();
	$con->close();
}	
}
else{
	echo "all field required";
	die();
}

?>
