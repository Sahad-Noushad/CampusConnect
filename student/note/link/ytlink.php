<?php
    session_start();
    include_once "../../../connect.php";
    $year=$_SESSION['year'];
    $course=$_SESSION['course'];
    $sem=$_SESSION['sem'];
    $sub=$_SESSION['sub'];
    $mod=$_POST['mod'];
    $sql="SELECT link FROM ytlink WHERE year='$year' AND course='$course' AND sem='$sem' AND sub='$sub' AND module='$mod'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res)){
        echo "
            <div class=\"link\">
                <iframe src=\"".$row['link']."\" frameborder=\"0\" allowfullscreen></iframe>
            </div>
        ";
    }
?>