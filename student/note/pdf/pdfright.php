<?php
    session_start();
        $dir='../../../study/notes/public/'.$_SESSION['year'].'/'.$_SESSION['course'].'/'.$_SESSION['sem'].'/'.$_SESSION['sub'].'/'.$_POST['mod'];
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