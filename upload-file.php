<?php
$name=$_POST['prod'];
$price=$_POST['price'];
$desc=$_POST['desc'];


print_r($_POST);
echo "<br>";


print_r($_FILES['image']);

session_start();
$usname=$_SESSION['username'];
$prefix_path="../shared/image/";

$file_name=$prefix_path.date("d-m-Y-H-i-s").$_FILES['image']['name'];
move_uploaded_file($_FILES['image']['tmp_name'],$file_name);

include '../shared/connection.php'; 

$data=mysqli_query($conn,"insert into poduct(username,name,price,discription,image) values ('$usname','$name',$price,'$desc','$file_name')" );
if(!$data){
    echo "oops something went wrong";
    die;
}
echo"uploaded";
header('location:upload.php');
?>