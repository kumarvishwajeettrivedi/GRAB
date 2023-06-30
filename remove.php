<?php
$si_no=$_GET['idpr'];

include_once "../shared/connection.php";
$delete=mysqli_query($conn,"delete from cart where si_no ='$si_no'");
if($delete){
    echo"product is deleted";
    header('location:view.php');
}
else{
    echo"error in $conn";
    echo mysqli_error($conn);
}

?>