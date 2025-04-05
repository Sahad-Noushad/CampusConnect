<?php
    session_start();
    if(isset($_SESSION['idno'])){
        if(isset($_POST['private'])){
            if(isset($_FILES['document']['name'])){
                $allowedext=array("pdf","doc","ppt","docs","png","jpg","jpeg","svg");
                $ext=strtolower(pathinfo($_FILES['document']['name'],PATHINFO_EXTENSION));
                if(in_array($ext,$allowedext)){
                    $dir='../../../study/notes/private/';
                    $pdir=$dir.$_SESSION['idno'];
                    $fname=$_FILES['document']['name'];
                    if(is_dir($pdir)){
                        
                        if(file_exists($pdir.'/'.$fname)){
                            echo "file already exist";
                        }
                        else{
                            if(move_uploaded_file($_FILES['document']['tmp_name'],$pdir.'/'.$fname)){
                                header("Location:priupload.html");
                                exit();
                            }
                            else{
                                echo "An error occured please try again later...";
                            }
                        }
                    }
                    else{
                        mkdir($pdir,0777,true);
                        if(move_uploaded_file($_FILES['document']['tmp_name'],$pdir.'/'.$fname)){
                            header("Location:priupload.html");
                            exit();
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