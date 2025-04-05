<?php
    session_start();
        if(isset($_SESSION['idno'])){
?>

<html>
    <head>
        <title>Notes</title>
        <link rel="stylesheet" href="../../student/note/noteslct.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../admin.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Notes</p>
            </div>
            <div class="content">
                <div class="note pdf" onclick="location.href='pdf/anote.php'">
                    <img class="image" src="../../image/document.png">
                    <button class="btn" >Pdf<i class='fas fa-arrow-circle-right'></i></button>
                </div>
                <div class="note qn" onclick="location.href='qn/aqn.php'">
                    <img class="image" src="../../image/qn.png" >
                    <button class="btn">Question Paper<i class='fas fa-arrow-circle-right'></i></button>
                </div>
                <div class="note text" onclick="location.href='txt/atxt.php'">
                    <img src="../../image/txt.png" class="image">
                    <button class="btn" >Text book<i class='fas fa-arrow-circle-right'></i></button>
                </div>
                <div class="note link" onclick="location.href='link/alink.php'">
                    <img src="../../image/yt.png" class="image">
                    <button class="btn">Links<i class='fas fa-arrow-circle-right'></i></button>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
        
    }else{
        header("Location:../../login.html");
        exit();
    }
?>