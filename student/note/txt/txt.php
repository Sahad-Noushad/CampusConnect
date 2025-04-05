<?php
    session_start();
    $dir='../../../study/text/'.$_SESSION['year'].'/'.$_SESSION['course'].'/'.$_POST['sem'].'/'.$_POST['sub'];
    if($dh=opendir($dir)){
        while(($file=readdir($dh))!== false){
            if($file!=='.'&$file!=='..'){
                echo "
                    <div class=\"pdf\" onclick=\"location.href='".$dir."/".$file."'\">
                        ".$file."
                    </div>
                ";    
            }
            
        }
    }
?>