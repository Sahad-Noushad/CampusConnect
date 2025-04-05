<?php
    include_once "../../../connect.php";
    $date=$_GET['date'];
    $sql="DELETE FROM calendar WHERE date='$date'";
    if(mysqli_query($con,$sql)){
        header("Location:acaldel.php");
    }else{
        echo "Error ".$sql.":-".mysqli_error($con);
    }
?>