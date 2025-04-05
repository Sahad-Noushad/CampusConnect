<?php
session_start();
if(isset($_SESSION['idno'])){
?>


<html>
    <head>
        <title>Calender</title>
        <link rel="stylesheet" href="../../admin/profile/aprofile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../faculty.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Calender</p>
                <ul>
                    <li>
                        <a href="../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="ver" onclick="location.href='view/calendarmain.php'">
                    <p>View Calendar<i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="delete" onclick="location.href='delete/fcaldel.php'">
                    <p>Delete Dates<i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="atten" onclick="location.href='add/fcalup.php'">
                    <p>Add Dates<i class="fas fa-arrow-circle-right"></i></p>
                </div>
                <div class="list" onclick="location.href='list/fcallist.php'">
                    <p>List of Dates <i class="fas fa-arrow-circle-right"></i></p>
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