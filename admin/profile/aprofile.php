<?php
session_start();
if(isset($_SESSION['idno'])){
?>


<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="aprofile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../admin.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Profile</p>
                <ul>
                    <li>
                        <a href="../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="ver" onclick="location.href='verify/aprofilever.php'">
                    <p>Profile verification <i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="delete" onclick="location.href='delete/aprofiledel.php'">
                    <p>Profile deletion <i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="atten" onclick="location.href='attendance/attandance.php'">
                    <p>attendance marking <i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="list" onclick="location.href='list/aprofilelist.php'">
                    <p>List of profiles <i class="fas fa-arrow-circle-right"></i></p>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
}else{
    header("Location:../login.html");
    exit();
}
?>