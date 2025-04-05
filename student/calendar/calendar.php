<?php
    $date=$_POST['date'];
    $op=$_POST['op'];

    if($op=='check'){
        include_once "../../connect.php";
        $sql="SELECT * FROM calendar WHERE date='$date'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0){
            echo "1";
        }else{
            echo "0";
        }
    }
    else if($op=='event'){
        include_once "../../connect.php";
        $sql="SELECT * FROM calendar WHERE date='$date'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            echo $row['event']."<br><a>".$row['link']."</a>";
        }else{
            echo "<p>No events available now</p>";
        }
    }
?>