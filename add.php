<?php
$si_no=$_GET['idpr'];
session_start();
$uname=$_SESSION['userdata']['username'];


include "../shared/connection.php";
$status=mysqli_query($conn,"insert into cart(name,si_no) values('$uname',$si_no)");
header('location:cart.php');
?>