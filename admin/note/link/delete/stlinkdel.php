<?php
    include_once "../../../../connect.php";
    $sino=$_GET['sino'];
    $sql="DELETE FROM stlink WHERE Sino='$sino'";
    if(mysqli_query($con,$sql)){
        header("Location:alinkdel.php");
    }else{
        echo "Error".$sql.":-".mysqli_error($con);
    }
?>