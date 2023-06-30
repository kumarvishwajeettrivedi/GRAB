<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
</head>
<body>
    
</body>
</html>

<?php
session_start();

if(!isset($_SESSION['login'])){
    echo"invalid access";
    die;

}
if($_SESSION['login']==false){
    echo"what are you doing son";
    die;
}
$uname=$_SESSION['username'];

include "menu.html";

include "../shared/connection.php";

$pro=mysqli_query($conn,"select *from poduct join porder on poduct.si_no=porder.si where username='$uname'");

echo"<div >";
while($row=mysqli_fetch_assoc($pro)){
    $name=$row['name'];
    $image=$row['image'];
    $si_no=$row['si_no'];
    $price=$row['price'];


    echo "
    <div >
    <div>
    <div>$name</div>
    <div>$price</div>
    </div>
    <div><img src='$image' height='100px' width='200px' ></div>
    <div>$price</div>

    </div>
    ";


}
echo "</div>";

?>