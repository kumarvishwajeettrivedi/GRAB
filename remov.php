<?php
$si_no=$_GET['idpr'];

include "../shared/connection.php";
$delete=mysqli_query($conn,"delete from porder where si='$si_no'");
if($delete){
    echo"product is deleted";
    header('location:order.php');
}
else{
    echo"error in $conn";
    echo mysqli_error($conn);
}

?>