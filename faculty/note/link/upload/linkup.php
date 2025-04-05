<?php
    session_start();
    if(isset($_POST['submit'])){
        include_once "../../../../connect.php";
        $type=$_POST['link'];
        $year=$_POST['year'];
        $course=$_POST['course'];
        $sem=$_POST['sem'];
        $sub=$_POST['sub'];
        $mod=$_POST['mod'];
        $link=$_POST['linkadd'];
        if($type=="yt"){
            $sql="INSERT INTO ytlink (Sino,year,course,sem,sub,module,link)VALUES('','$year','$course','$sem','$sub','$mod','$link')";
            if($res=mysqli_query($con,$sql)){
                header("Location:uploaded.html");
            }
            else{
                echo "Error";
            }
        }else{
            $name=$_POST['name'];
            $sql="INSERT INTO stlink (Sino,year,course,sem,sub,module,link,name)VALUES('','$year','$course','$sem','$sub','$mod','$link','$name')";
            if($res=mysqli_query($con,$sql)){
                header("Location:uploaded.html");
            }
            else{
                echo "Error";
            }   
        }
    }else{
        header("Location:alinkup.php");
        exit();
    }
?>