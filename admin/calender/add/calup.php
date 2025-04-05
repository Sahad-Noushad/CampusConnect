<?php
    if(isset($_POST['submit'])){
        include_once "../../../connect.php";
        $month=$_POST['month'];
        $day=$_POST['day'];
        $event=$_POST['event'];
        $link=$_POST['link'];
        $date=$month."/".$day;
        $sql="INSERT INTO calendar (date,event,link) VALUES('$date','$event','$link')";
        if(mysqli_query($con,$sql)){
            header("Location:acalup.php");
        }else{
            echo "Error ".mysqli_error($con);
        }
    }
?>