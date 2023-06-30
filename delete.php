<?php
$si=$_GET['idpr'];
include_once "../shared/connection.php";
$delete=mysqli_query($conn,"DELETE FROM poduct where si_no=$si");
if($delete){
    echo"product is deleted";
    header('location:view.php');
}
else{
    echo"error in $conn";
    echo mysqli_error($conn);
}

?>