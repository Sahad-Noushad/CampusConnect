<?php
    $con= mysqli_connect('localhost','root','','campusconnect');
    if(!$con){
        die("Connection failed: " . mysql_error());
    }
?>