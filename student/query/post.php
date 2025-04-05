<?php
    function vote(){
        include_once "../../connect.php";
        $queryid=$_POST['id'];
        $regno=$_POST['regno'];
        $sql="SELECT * FROM vote WHERE regno='$regno' AND queryid='$queryid'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)==0){
            $sql1="UPDATE query SET vote=vote+1 WHERE queryid='$queryid'";
            $res1=mysqli_query($con,$sql1);
            $sql2="INSERT INTO vote(regno,queryid) VALUES ('$regno','$queryid')";
            $res2=mysqli_query($con,$sql2);
        }
        else{
            $sql1="UPDATE query SET vote=vote-1 WHERE queryid='$queryid'";
            $res1=mysqli_query($con,$sql1);
            $sql2="DELETE FROM vote WHERE regno='$regno' AND queryid='$queryid'";
            $res2=mysqli_query($con,$sql2);
        }
    }
    function del(){
        include_once "../../connect.php";
        $queryid=$_POST['id'];
        $sql="DELETE FROM query WHERE queryid='$queryid'";
        $res=mysqli_query($con,$sql);
        $sql1="DELETE FROM vote WHERE queryid='$queryid'";
        $res1=mysqli_query($con,$sql1);
        $sql2="SELECT img FROM query WHERE queryid='$queryid'";
        $res2=mysqli_query($con,$sql2);
        $row=mysqli_fetch_assoc($res2);
        unlink("images/".$row['img']);
    }
    $op=$_POST['op'];
    switch($op){
        case 'vote':
            vote();
            break;
        case 'del':
            del();
            break;
    }
?>