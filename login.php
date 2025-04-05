<?php
    session_start();
    include_once "connect.php";
    if(isset($_POST['submit'])){
        if(isset($_POST['idno'])&&isset($_POST['password'])){
            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return($data);
            }
            $lidno=validate($_POST['idno']);
            $lpassword=validate($_POST['password']);

            $sql="SELECT * FROM login WHERE idno='$lidno' AND password='$lpassword'";
            $result=mysqli_query($con,$sql);

            if(mysqli_num_rows($result)==1){
                $row=mysqli_fetch_assoc($result);
                if($row['idno']===$lidno&&$row['password']===$lpassword){
                    $_SESSION['idno']=$row['idno'];
                    $_SESSION['password']=$row['password'];
                    if($row['role']==="admin"){
                        header("Location:admin/admin.php");
                    }elseif($row['role']==="faculty"){
                        header("Location:faculty/faculty.php");
                    }
                    else{
                        header("Location:home.php");
                    }
                }
                else{
                    header("Location:error.html");
                    exit();
                }
            }
            else{
                $sql="SELECT * FROM student WHERE sregno='$lidno' AND spassword='$lpassword' AND sapprove='0'";
                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)==1){
                    $row=mysqli_fetch_assoc($result);
                    if($row['sregno']===$lidno&&$row['spassword']===$lpassword){
                        header("Location:registered.html");
                        exit();
                    }
                    else{
                        header("Location:error.html");
                        exit();
                    }
                }
                else{
                    $sql="SELECT * FROM faculty WHERE fidno='$lidno' AND fpassword='$lpassword' AND fapprove='0'";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result)==1){
                        $row=mysqli_fetch_assoc($result);
                        if($row['fidno']===$lidno&&$row['fpassword']===$lpassword){
                            header("Location:registered.html");
                            exit();
                        }
                        else{
                            header("Location:error.html");
                            exit();
                        }
                    }
                }
                header("Location:error.html");
                exit();
            }
            
        }
    }
?>