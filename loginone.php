 <?php
$conn = mysqli_connect("localhost","root","","bkas") or die("connection error");
if(isset($_POST['submit'])){
  
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);
  $pswdr = mysqli_real_escape_string($conn,$_POST['pswdr']);
  

$sql = "SELECT * FROM try WHERE phone = '$phone'";
$res = mysqli_query($conn,$sql) or die("query error");
$count = mysqli_num_rows($res);
if($count){
  $var = mysqli_fetch_assoc($res);
  $hash = $var['password'];
  
  echo "your database password=".$hash."<br>";
  $pass_decode = password_verify($pswdr, $hash);

  if ($pass_decode) {
    
    echo ' password...';
    
}
 else {
    echo 'Invalid password...';
}
}
else{
  echo "your number already exists...";
}

}
?>