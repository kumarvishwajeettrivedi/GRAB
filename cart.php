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
        display:flex;
     height:100vh;
     width:100vw;
     margin:0;
     padding:0;
        flex-wrap:wrap;
     
       
      }  
    .box{
        border:2px solid #eee;
        width:200px;
        height:220px;
     
        background-color:#3375;
    }
</style>
</head>
<body>
   
    
</body>
</html>




<?php
include "../shared/connection.php";



$uname=$_SESSION['username'];

$curr=mysqli_query($conn,"select* from poduct join cart on poduct.si_no =cart.si_no where cart.name ='$uname'");

echo"<h1>welcome back $uname!</h1>";
echo"<br>";
echo "<div class='container'>";

while($row=mysqli_fetch_assoc($curr)){
    $name=$row['name'];
    $price=$row['price'];
    $image=$row['image'];
    $desc=$row['discription'];
    $si=$row['si_no'];

    echo "
  
    <div class='box'>
    <div class='d-flex justify-content-between'>
    <div >$name</div>
    <div class='text-primary '>$$price</div>
    </div>
    <div class='text-center'><img src='$image' height='100px' width='150px' ></div>
    <div class='desc'>$desc</div>
    <div class='d-flex justify-content-between  mt-4'>

    <div>
    <a href='order.php?idr=$si'>
    <button  class='bg-primary rounded-1 border-0 '><i class='bi-arrow-up p-1'></i></button>
    </a>
    </div>
    
    <div>
    <a href='remove.php?idpr=$si'>
    <button  class='bg-danger rounded-1 border-0'><i class='bi-trash p-1 '></i></button>
     </a>
    </div>
    
    
    </div>

    </div>";
    
    

}
echo"</div>";
?>


<!-- add a column for userifd in product so it can be uniquly identified by select -->