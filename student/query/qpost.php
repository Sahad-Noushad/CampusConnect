<?php
    session_start();
    
    if(isset($_POST['submit'])){
        if(isset($_SESSION['idno'])){
            include_once "../../connect.php";
            $idno=$_SESSION['idno'];
            $stu="SELECT sname,scourse FROM student WHERE sregno='$idno'";
            $res1=mysqli_query($con,$stu);
            $row=mysqli_fetch_assoc($res1);
            $pt="SELECT queryid,img FROM query";
            $res2=mysqli_query($con,$pt);

            if(!empty($_FILES['image']['name'])){
                $allowedext=array("pdf","jpg","jeg","png","svg");
                $ext=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
                if(in_array($ext,$allowedext)){
                    if(mysqli_num_rows($res2)!=0){
                        $rows=mysqli_fetch_assoc($res2);
                        do{
                            $fname=rand(1000,100000000)."-".$_FILES['image']['name'];
                        }while($fname==$rows['img']);   
                    }else{
                        $fname=rand(1000,100000000)."-".$_FILES['image']['name'];
                    }
                    $dir="images/";
                    move_uploaded_file($_FILES['image']['tmp_name'],$dir.$fname);
                }
                else{
                    echo "Please upload image or pdf.";
                }
            }
            else{
                $fname='NULL';
            }
            if(mysqli_num_rows($res2)!=0){
                $rows=mysqli_fetch_assoc($res2);
                do{
                    $qid=rand(1,1000000);
                }while($qid==$rows['queryid']);
            }else{
                $qid=rand(1,1000000);
            }
            
            $date=date("Y-m-d");
            date_default_timezone_set("Asia/Calcutta");
            $time=date("H:i:s");
            $name=$row['sname'];
            $sub=$_POST['sub'];
            $txt=$_POST['txt'];
            $course=$row['scourse'];
            $pst="INSERT INTO query(regno,queryid,name,date,time,sub,content,department,img) VALUES ('$idno','$qid','$name','$date','$time','$sub','$txt','$course','$fname')";
            if(mysqli_query($con,$pst)){
                header("Location:query.php");
            }
            else{
                echo "Error";
            }
        }
    }
?>