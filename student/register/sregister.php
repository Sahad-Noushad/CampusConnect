<?php
    include_once "../../connect.php";
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $regno=$_POST['regno'];
            $email=$_POST['email'];
            $gen=$_POST['gen'];
            $year=$_POST['year'];
            $course=$_POST['course'];
            $password=$_POST['password'];
            $sql1="INSERT INTO student (sregno,sname,semail,gen,syear,scourse,spassword,sapprove)VALUES ('$regno','$name','$email','$gen','$year','$course','$password','0')";
            if(mysqli_query($con,$sql1)){
                header("Location: ../../registered.html");
            }else{
                echo "Error ".$sql1.":-".mysqli_error($con);
            }
            mysqli_close($con);
        }
?>