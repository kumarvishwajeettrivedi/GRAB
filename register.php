<?php
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$hash=md5($upass);
include '../shared/connection.php'; 

$mysql_cursor=mysqli_query($conn,"select *from vender where name='$uname'");
$count=mysqli_num_rows($mysql_cursor);               
if($count>0){
    echo"user name already taken try another";                               // we can also do the whole thing by sql by making it unique
    die;
}
else{

    $status=mysqli_query($conn,"insert into vender(name,password) values('$uname','$hash')");
    
    if($status){
        echo "login success";
    }
    header('location:login.html');
}


?>