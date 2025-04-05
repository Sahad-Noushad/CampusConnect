<?php
    include_once "../../../../connect.php";
    $sino=$_POST['sino'];
    $file=$_POST['file'];
    $op=$_POST['op'];
    if($op=='del'){
        $isdel=unlink($file);
        $sql="DELETE FROM tmppnote WHERE Sino='$sino'";
        $result=mysqli_query($con,$sql);
        $del=$result&&$isdel;
        echo $del;
    }
    else if($op=='verify'){
        $dir=$_POST['dir'];
        $indexdir="../../../../study/notes/public/";
        $isver=rename($file,$indexdir.$dir);
        $sql="DELETE FROM tmppnote WHERE Sino='$sino'";
        $result=mysqli_query($con,$sql);
        $mv=$result&&$isver;
        echo $isver;
    }
?>