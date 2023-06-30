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

include "menu.html";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    .container{
      height:250px;
      width:100%;
      background-color:white;
      display:flex;
      flex-wrap: wrap;
      flex-direction:row;
      align-items:center;

    }    
        
    .box{
        border:1px solid black;
        width:250px;
        height:300px;
        background-color:#3373;
    }
</style>
</head>
<body>
   
    
</body>
</html>




<?php
include "../shared/connection.php";


$cutr=mysqli_query($conn,"select * from poduct");

while($ro=mysqli_fetch_assoc($cutr)){
    $usname=$_SESSION['username'];
}

$curr=mysqli_query($conn,"select* from poduct where username='$usname'");

echo"<h1>welcome back '$usname' !</h1>";
echo"<br>";
echo "<div class='container'>";
while($row=mysqli_fetch_assoc($curr)){
    $name=$row['name'];
    $price=$row['price'];
    $image=$row['image'];
    $desc=$row['discription'];
    $si=$row['si_no'];

    echo "
  
    <div class='box p-2 m-4 mt-3 '>
    <div class=' d-inline-flex'>$name</div>
    <div class='text-primary d-inline-flex mx-5'>$$price</div>
    <div class='text-center'><img src='$image' height='100px' width='200px' ></div>
    <div class='desc'>$desc</div>
    <div class='d-flex justify-content-around align-items-center mt-4'>
    <div>
    <a href='edit.php'>
    <button  class='bg-warning rounded-1 border-0 '><i class='bi-pencil p-1'></i></button>
     </a>
    </div>

    <div>
    <a href='delete.php?idpr=$si'>
    <button  class='bg-danger rounded-1 border-0'><i class='bi-trash p-1 '></i></button>
     </a>
    </div>
   
    
    </div>
    </div>";

  

}
echo"</div>";
?>


<!-- add a column for userifd in product so it can be uniquly identified by select -->