<?php
session_start();
if(isset($_SESSION['idno'])){
    $dir='../../../study/qn/'.$_SESSION['year'].'/'.$_SESSION['course'].'/'.$_SESSION['sem'].'/'.$_SESSION['sub'];
    if($dh=opendir($dir)){

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Question Paper</title>
        <link rel="stylesheet" href="qn.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script> 
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../noteslct.php"><i class="fas fa-arrow-circle-left">back</i></a></li>
                </ul>
                <p>Question paper</p>
            </div>
            <div class="content">
                <?php
                    while(($file=readdir($dh))!==false){
                        if($file!='.'&&$file!='..'){
                            echo "
                                <div class=\"qn\" onclick=\"location.href='".$dir."/".$file."'\">".$file."</div>
                            ";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>
<?php
    }
}else{
    header("Location:../../login.html");
    exit();
}

?>