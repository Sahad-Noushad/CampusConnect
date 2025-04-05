<?php
    session_start();
    if(isset($_SESSION['idno'])){
        $dir='../../../study/text/'.$_SESSION['year'].'/'.$_SESSION['course'].'/'.$_SESSION['sem'].'/'.$_SESSION['sub'];
        if($dh=opendir($dir)){
?>

<html>
    <head>
        <title>Text Books</title>
        <link rel="stylesheet" href="stext.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../noteslct.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Text Book</p>
            </div>
            <div class="main">
                <div class="txt">
                <?php
                    if(count(scandir($dir))==2){
                        ?>
                        <p>Currently no text books are available.</p>
                        <?php
                    }else{
                        while(($file=readdir($dh))!==false){
                            if($file!='.'&&$file!='..'){
                                echo "
                                    <div class=\"pdf\" onclick=\"location.href='".$dir."/".$file."'\">".$file."</div>
                                ";
                            }
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
        }
    }
    else{
        header("Location:../../../login.html");
        exit();
    }
?>