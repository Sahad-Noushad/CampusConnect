<?php
session_start();
include_once "connect.php";
if(isset($_SESSION['idno'])){
    $regno=$_SESSION['idno'];
    $sql="SELECT role FROM login WHERE idno='$regno'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="home.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            window.addEventListener('scroll',function(){
                var profile=document.getElementById("profile");
                var text=document.getElementById("text");
                var bottom=document.getElementById("bottom");
                if(window.scrollY>0){
                    profile.style.left="100%";
                    text.style.left="-100%";
                    bottom.style.top="25%";
                }else{
                    profile.style.left="63%";
                    text.style.left="0%";
                    bottom.style.top="65%";
                }
            });
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <img src="image/logo.png" class="logo" onclick="location.href='logout.php'">
                <ul>
                    <li><a href="aboutus.html">About us</a></li>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </div>
            <div class="content">
                <div class="text" id="text">
                    <div class="up">
                        <p>Learn.<br>Engage.<br>Excel.</p>
                    </div>
                    <div class="down">
                        <p>Our solution</p>
                        <p>To your problems</p>
                    </div>
                </div>
                <div class="profile" id="profile" onclick="location.href='student/profile/sprofile.php'">
                    <img src="image/profile.png">
                    <button>Profile <i class='fas fa-arrow-circle-right'></i></button>
                </div>
            </div>
            <div class="bottom" id="bottom">
                <div class="subt">
                    <p>Let's do <br>what we can!</p>
                </div>
                <div class="notes" onclick="location.href='student/note/snote.php'">
                    <img src="image/notes.png">
                    <button>Notes<i class='fas fa-arrow-circle-right'></i></button>
                </div>
                <div class="query">
                    <img src="image/qry.png" onclick="location.href='student/query/query.php'">
                    <button>query<i class='fas fa-arrow-circle-right'></i></button>
                </div>
                <div class="cal">
                    <img src="image/cal.png" onclick="location.href='student/calendar/calendarmain.php'">
                    <button>Calender<i class='fas fa-arrow-circle-right'></i></button>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}else{
    header("Location:login.html");
    exit();
}
?>