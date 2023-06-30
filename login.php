<?php
$uname=$_POST['uname'];
$upass=$_POST['upass'];

session_start();
$_SESSION['login']=false;

$hash=md5($upass);
include '../shared/connection.php'; 


$cur=mysqli_query($conn,"select *from vender where name='$uname' and password='$hash'");
if(mysqli_num_rows($cur)==0){
    echo"invalid credintial";
}
else{
     echo "<br>";
    echo "welcome back spiderman $uname ";
    $_SESSION['login']=true;
    $row=mysqli_fetch_assoc($cur);
    $_SESSION['userdata']=$row;
    $_SESSION['username']=$row['name'];
    header('location:upload.php');
}




?>