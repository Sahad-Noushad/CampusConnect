<?php
session_start();
if(isset($_SESSION['idno'])){
?>

<html>
    <head>
        <title>Note</title>
        <link rel="stylesheet" href="../../../admin/profile/aprofile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../note.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Note</p>
                <ul>
                    <li>
                        <a href="../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="ver" onclick="location.href='verify/fnotever.php'">
                    <p>Note verification <i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="delete" onclick="location.href='delete/fnotedel.php'">
                    <p>Note deletion <i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="atten" onclick="location.href='upload/fnoteadd.php'">
                    <p>Note uploading<i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="list" onclick="location.href='list/fnotelist.php'">
                    <p>List of notes <i class="fas fa-arrow-circle-right"></i></p>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
}else{
    header("Location:../../../login.html");
    exit();
}
?>