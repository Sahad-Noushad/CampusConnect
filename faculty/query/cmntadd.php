<?php
    session_start();
    
    if(isset($_POST['submit'])){
        if(isset($_SESSION['idno'])){
            include_once "../../connect.php";
            $qid=$_SESSION['qid'];
            $idno=$_SESSION['idno'];
            $stu="SELECT fname FROM faculty WHERE fidno='$idno'";
            $res1=mysqli_query($con,$stu);
            $row=mysqli_fetch_assoc($res1);
            $pt="SELECT cmntid,img FROM comment";
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
                    $dir="../../student/query/images/";
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
                    $cmntid=rand(1,1000000);
                }while($cmntid==$rows['cmntid']);
            }else{
                $cmntid=rand(1,1000000);
            }
            
            $date=date("Y-m-d");
            date_default_timezone_set("Asia/Calcutta");
            $time=date("H:i:s");
            $name=$row['fname'];
            $txt=$_POST['txt'];
            $pst="INSERT INTO comment(cmntid,queryid,regno,name,date,time,content,img) VALUES ('$cmntid','$qid','$idno','$name','$date','$time','$txt','$fname')";
            $cq="UPDATE query SET cmnt=cmnt+1 WHERE queryid='$qid'";
            if(mysqli_query($con,$pst)&&mysqli_query($con,$cq)){
                header("Location:cmnt.php?qid=$qid");
            }
            else{
                echo "Error";
            }
        }
    }
?>