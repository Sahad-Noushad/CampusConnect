<?php
    session_start();
    if(isset($_POST['submit'])){
        if(isset($_SESSION['idno'])){
            $_SESSION['sub']=$_POST['sub'];
            $_SESSION['sem']=$_POST['sem'];
            header("Location:noteslct.php");
        }
    }else{
        header("Location:../../login.html");
        exit();
    }
    
?>