<?php
    $file=$_POST['file'];
    $isdel=unlink($file);
    echo $isdel;
?>