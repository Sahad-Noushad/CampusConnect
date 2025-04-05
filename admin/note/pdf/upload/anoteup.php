<?php
    session_start();
    if(isset($_POST['submit'])){
        if(isset($_SESSION['idno'])){
            if(isset($_FILES['document']['name'])){
                $allowedext=array("pdf", "ppt", "doc","docx","png","jpeg","jpg","svg");
                $ext=strtolower(pathinfo($_FILES['document']['name'],PATHINFO_EXTENSION));
                if(in_array($ext,$allowedext)){
                    $dir='../../../../study/notes/public/'.$_POST['year'].'/'.$_POST['course'].'/'.$_POST['sem'].'/'.$_POST['sub'].'/'.$_POST['mod'].'/';
                    $isuploaded=move_uploaded_file($_FILES['document']['tmp_name'],$dir.$_FILES['document']['name']);
                    if($isuploaded){
                        header("Location:uploaded.html");
                    }
                    else {
                        echo "Not uploaded";
                    }
                }else{
                    echo "Please upload pdf,ppt,doc,docx,png,jpeg,jpg,svg files";
                }
            }else{
                echo "file not inserted";
            }
        }else{
            echo "error";
        }
    }else{
        header("Location:../../../../login.html");
        exit();
    }
    
?>