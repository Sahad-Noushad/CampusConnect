<?php
    include_once "../../connect.php";
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $idno=$_POST['idno'];
            $email=$_POST['email'];
            $phone=$_POST['phoneno'];
            $dept=$_POST['dept'];
            $password=$_POST['password'];
            $sql1="INSERT INTO faculty (fidno,fname,fphone,femail,fdep,fpassword,fapprove)VALUES ('$idno','$name','$phone','$email','$dept','$password','0')";
            if(mysqli_query($con,$sql1)){
                header("Location: ../../registered.html");
            }else{
                echo "Error ".$sql1.":-".mysqli_error($con);
            }
            mysqli_close($con);
        }
?>