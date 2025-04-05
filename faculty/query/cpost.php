<?php

    function vote(){
        include_once "../../connect.php";
        $cmntid=$_POST['id'];
        $regno=$_POST['regno'];
        $sql="SELECT * FROM cvote WHERE regno='$regno' AND cmntid='$cmntid'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)==0){
            $sql1="UPDATE comment SET vote=vote+1 WHERE cmntid='$cmntid'";
            $res1=mysqli_query($con,$sql1);
            $sql2="INSERT INTO cvote(regno,cmntid) VALUES ('$regno','$cmntid')";
            $res2=mysqli_query($con,$sql2);
        }
        else{
            $sql1="UPDATE comment SET vote=vote-1 WHERE cmntid='$cmntid'";
            $res1=mysqli_query($con,$sql1);
            $sql2="DELETE FROM cvote WHERE regno='$regno' AND cmntid='$cmntid'";
            $res2=mysqli_query($con,$sql2);
        }
    }
    function del(){
        session_start();
        include_once "../../connect.php";
        $qid=$_SESSION['qid'];
        $cmntid=$_POST['id'];
        $sql="DELETE FROM comment WHERE cmntid='$cmntid'";
        $res=mysqli_query($con,$sql);
        $sql1="DELETE FROM cvote WHERE cmntid='$cmntid'";
        $res1=mysqli_query($con,$sql1);
        $cd="UPDATE query SET cmnt=cmnt-1 WHERE queryid='$qid'";
        $cdres=mysqli_query($con,$cd);
        $sql2="SELECT img FROM comment WHERE cmntid='$cmntid'";
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