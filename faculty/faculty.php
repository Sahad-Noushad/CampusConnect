<?php
session_start();
if(isset($_SESSION['idno'])){
    include_once "../connect.php";
    $idno=$_SESSION['idno'];
    $sql="SELECT fdep FROM faculty WHERE fidno='$idno'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
    $_SESSION['dep']=$dep=$row['fdep'];
?>

<html>
    <head>
        <title>Faculty</title>
        <link rel="stylesheet" href="faculty.css">
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
                    <h1>FACULTY</h1>
                </div>
                <div class="op">
                    <div class="profile" onclick="location.href='profile/list/fprofile.php'">
                        <img src="../image/profile.png">
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