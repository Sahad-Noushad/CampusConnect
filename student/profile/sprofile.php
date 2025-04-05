<?php
session_start();
include_once "../../connect.php";
if(isset($_SESSION['idno'])){
    $regno=$_SESSION['idno'];
    $stud="SELECT * FROM student WHERE sregno='$regno' AND sapprove='1'";
    $result=mysqli_query($con,$stud);
    $row=mysqli_fetch_assoc($result);
    $atten="SELECT * FROM attendance WHERE regno='$regno'";
    $res=mysqli_query($con,$atten);
    $arow=mysqli_fetch_assoc($res);
?>

<html>
    <head>
        <title>Student profile</title>
        <link rel="stylesheet" href="sprofile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="left">
                <div class="nav">
                    <ul>
                        <li><a href="../../home.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                    </ul>
                </div>
                <div class="top">
                    <img src="
                        <?php
                            if($row['gen']==='m'){
                                echo "../../image/mprofile.png";
                            }else{
                                echo "../../image/fprofile.png";
                            }
                        ?>
                    ">
                </div>
                <div class="name">
                    <p>
                        <?php
                            echo $row['sname'];
                        ?>
                    </p>
                </div>
                <div class="bottom">
                    <button class="dlib" onclick="location.href='https://www.inflibnet.ac.in/library/'">Digital library</button>
                    <button class="col" onclick="location.href='https://www.sreeayyappacollege.ac.in/'">College</button>
                    <button class="result" onclick="location.href='https://exams.keralauniversity.ac.in/Login/check8    '">Result</button>
                    <button class="note" onclick="location.href='spnote/spnote.php'" >Note space</button>
                    <button class="query" onclick="location.href='squery/query.php'" >Query</button>
                    <button class="techer" onclick="location.href='tcr/tcr.php'">Teacher</button>
                </div>
            </div>
            <div class="right">
                <div class="barchart">
                    <p>Monthly attendence percentage</p>
                    <div class="grid">
                        <div class="bar" data-name="January : <?php echo $arow['jan'];?>%" style="--bar-value:<?php echo $arow['jan'];?>%;"></div>
                        <div class="bar" data-name="February : <?php echo $arow['feb'];?>%" style="--bar-value:<?php echo $arow['feb'];?>%;"></div>
                        <div class="bar" data-name="March : <?php echo $arow['mar'];?>%" style="--bar-value:<?php echo $arow['mar'];?>%;"></div>
                        <div class="bar" data-name="April : <?php echo $arow['apr'];?>%" style="--bar-value:<?php echo $arow['apr'];?>%;"></div>
                        <div class="bar" data-name="May : <?php echo $arow['may'];?>%" style="--bar-value:<?php echo $arow['may'];?>%;"></div>
                        <div class="bar" data-name="June : <?php echo $arow['jun'];?>%" style="--bar-value:<?php echo $arow['jun'];?>%;"></div>
                        <div class="bar" data-name="July : <?php echo $arow['jul'];?>%" style="--bar-value:<?php echo $arow['jul'];?>%;"></div>
                        <div class="bar" data-name="August : <?php echo $arow['aug'];?>%" style="--bar-value:<?php echo $arow['aug'];?>%;"></div>
                        <div class="bar" data-name="September : <?php echo $arow['sep'];?>%" style="--bar-value:<?php echo $arow['sep'];?>%;"></div>
                        <div class="bar" data-name="October : <?php echo $arow['oct'];?>%" style="--bar-value:<?php echo $arow['oct'];?>%;"></div>
                        <div class="bar" data-name="November : <?php echo $arow['nov'];?>%" style="--bar-value:<?php echo $arow['nov'];?>%;"></div>
                        <div class="bar" data-name="December : <?php echo $arow['dece'];?>%" style="--bar-value:<?php echo $arow['dece'];?>%;"></div>
                    </div>
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