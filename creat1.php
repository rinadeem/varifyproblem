<?php
$conn = mysqli_connect("localhost","root","","bkas") or die("connection error");
if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$pswd = mysqli_real_escape_string($conn,$_POST['pswd']);
	$cpswd = mysqli_real_escape_string($conn,$_POST['cpswd']);

	$password = password_hash($pswd, PASSWORD_BCRYPT);
	$confirm = password_hash($cpswd, PASSWORD_BCRYPT);
}
$sql = "SELECT * FROM try WHERE phone = '$phone'";
$res = mysqli_query($conn,$sql) or die("query error");
if(mysqli_num_rows($res)>0){
echo "your number already exists...";
}
else{
	if($pswd==$cpswd){
		$sql = "INSERT INTO try( name, phone, password, confirm) VALUES ('$name','$phone','$password','$confirm');";
		
		$res = mysqli_query($conn,$sql) or die("query error");
		header("location:http://localhost/nogod/login.php");
	}
	else{
		echo "your password does not match..";
	}
}


?>