<?php
    session_start();
    include_once "../../../connect.php";
    if(isset($_SESSION['idno'])){
        if(isset($_POST['public'])){
            if(isset($_FILES['document']['name'])){
                $allowedext=array("pdf","doc","ppt","docs","png","jpg","jpeg","svg");
                $ext=strtolower(pathinfo($_FILES['document']['name'],PATHINFO_EXTENSION));
                if(in_array($ext,$allowedext)){
                    $txtdir='../../../study/notes/tmppublic';
                    $year=$_POST['year'];
                    $course=$_POST['course'];
                    $sem=$_POST['sem'];
                    $sub=$_POST['sub'];
                    $mod=$_POST['mod'];
                    $dir=$year.'/'.$course.'/'.$sem.'/'.$sub.'/'.$mod;
                    $fname=$_FILES['document']['name'];
                    if(file_exists($dir.$fname)){
                        echo "File already exist";
                    }
                    else{
                        if(move_uploaded_file($_FILES['document']['tmp_name'],$txtdir.'/'.$dir.'/'.$fname)){

                            $sql1="INSERT INTO tmppnote (nyear,ncourse,nsem,nsub,nmod,name) VALUES ('$year','$course','$sem','$sub','$mod','$fname')";
                            if($result=mysqli_query($con,$sql1)){
                                header("Location:pubuploaded.html");
                                exit();
                            }
                            else{
                                echo "Error ".$sql1.":-".mysqli_error($con);
                            }
                        }
                        else{
                            echo "An error occured please try again later...";
                        }
                    } 
                }
                else{
                    echo "Please upload pdf,ppt,doc,docs,png,jpg,jpeg or svg files.";
                }
            }
            else{
                echo "Please upload file";
                exit();
            }
        }
        else{
            header("Location:spnote.php");
            exit();
        }
    }
    else{
        header("Location:../../../login.html");
        exit();
    }
?>