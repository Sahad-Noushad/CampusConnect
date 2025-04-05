<?php
session_start();
if(isset($_SESSION['idno'])){
    if(stristr($_SESSION['idno'],'cs')){
        $_SESSION['dep']="cs";
    }elseif(stristr($_SESSION['idno'],'imb')){
        $_SESSION['dep']="imb";
    }elseif(stristr($_SESSION['idno'],'ele')){
        $_SESSION['dep']="ele";
    }elseif(stristr($_SESSION['idno'],'math')){
        $_SESSION['dep']="math";
    }elseif(stristr($_SESSION['idno'],'bcom')){
        $_SESSION['dep']="bcom";
    }elseif(stristr($_SESSION['idno'],'eng')){
        $_SESSION['dep']="english";
    }
?>

<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="admin.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <img src="../image/logo.png" class="logo" onclick="location.href='../logout.php'">
                <ul>
                    <li><a href="../logout.php">Log out</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="title">
                    <h1>ADMIN CONTROL PANEL</h1>
                </div>
                <div class="op">
                    <div class="profile" onclick="location.href='profile/aprofile.php'">
                        <img src="../image/profile.png" onclick="location.href='aprofile.html'">
                        <button onclick="location.href='aprofile.html'">Profile <i class='fas fa-arrow-circle-right'></i></button>
                    </div>
                    <div class="notes" onclick="location.href='note/note.php'">
                        <img src="../image/notes.png">
                        <button>Notes<i class='fas fa-arrow-circle-right'></i></button>
                    </div>
                    <div class="query" onclick="location.href='query/query.php'">
                        <img src="../image/qry.png">
                        <button>query<i class='fas fa-arrow-circle-right'></i></button>
                    </div>
                    <div class="calender" onclick="location.href='calender/cal.php'">
                        <img src="../image/cal.png">
                        <button>Calender<i class='fas fa-arrow-circle-right'></i></button>
                    </div>
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