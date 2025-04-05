<?php
    $dir='../../../../study/text/'.$_POST['year'].'/'.$_POST['course'].'/'.$_POST['sem'].'/'.$_POST['sub'];
    if($dh=opendir($dir)){
        while(($file=readdir($dh))!== false){
            if($file!=='.'&$file!=='..'){
                echo "
                    <tr style=\"color:white;\"> 
                        <td>".$_POST['year']."</td>
                        <td>".$_POST['course']."</td>
                        <td>".$_POST['sem']."</td>
                        <td>".$_POST['sub']."</td>
                        <td><a href=\"".$dir."/".$file."\" style=\"text-decoration:none;color:white;\">".$file."</a></td>
                    </tr>
                ";    
            }
            
        }
    }
?>