<?php
session_start();
if(isset($_SESSION['idno'])){
?>

<html>
    <head>
        <title>Link</title>
        <link rel="stylesheet" href="../../../admin/profile/aprofile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../note.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Link</p>
                <ul>
                    <li>
                        <a href="../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="delete" onclick="location.href='delete/flinkdel.php'">
                    <p>Link deletion <i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="upload" onclick="location.href='upload/flinkup.php'">
                    <p>Link uploading<i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="list" onclick="location.href='list/flinklist.php'">
                    <p>List of Link<i class="fas fa-arrow-circle-right"></i></p>
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