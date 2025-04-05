<?php
    $dir='../../../study/notes/public/'.$_POST['year'].'/'.$_POST['course'].'/'.$_POST['sem'].'/'.$_POST['sub'];
    $num=count(scandir($dir))-2;
    $str="<option value=\"\" selected hidden disabled>Select Module</option>";
    for ($i=1;$i<=$num;$i++) { 
        $str=$str."
            <option value=\"".$i."\">Module ".$i."</option>
        ";
    }
    echo $str;
?>