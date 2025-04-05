<?php
session_start();
if(isset($_SESSION['idno'])){
?>
<html>
    <head>
        <title>Note space</title>
        <link rel="stylesheet" href="spnote.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script src="../../../js/jquery-3.7.0.min.js"></script> 
        <script>
            function change(sem){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                $.post("../../../admin/note/pdf/asub.php", {sem:sem,course:course,year:year},function(data){
                    $("#sub").html(data);
                });
            }
            function module(sub){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                var sem=document.getElementById("sem").value;
                $.post("../../../admin/note/pdf/amod.php", {sub:sub,course:course,year:year,sem:sem},function(data){
                    $("#mod").html(data);
                });
            }
            function rightclick(e,file){
                if(e.which==3||e.button==2){
                    $.post("spnotedel.php",{file:file},function(data){
                        if(data==1){
                            alert("Deleted");
                            location.reload();
                        }
                        else{
                            alert("Error");
                        }
                    });
                }
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../sprofile.php"><i class="fas fa-arrow-circle-left">Back</i></a></li>
                </ul>
                <p>Note space</p>
            </div>
            <div class="content">
            <div class="pnote">
                <p style="position:absolute;top:0%;text-transform:uppercase;color:black;font-size:20px;">Private notes</p>
                <?php
                    $dir='../../../study/notes/private/'.$_SESSION['idno'].'/';
                    if(is_dir($dir)){
                        if(count(scandir($dir))==2){
                            ?>
                            <p style="text-transform:uppercase;color:black;">Upload a file first...</p>
                            <?php
                        }
                        else{
                            if($dh=opendir($dir)){
                                while(($file=readdir($dh))!== false){
                                    if($file!=='.'&&$file!=='..'&&strtolower(substr($file,strpos($file,'.')+1))!='txt'){
                                        echo "
                                            <div data-value=\"".$dir.$file."\" onmousedown=\"rightclick(event,this.dataset.value)\" class=\"pdf\" onclick=\"location.href='".$dir.$file."'\" title=\"Left click for open and Right click for delete.\">
                                                ".$file."
                                            </div>
                                        ";    
                                    }
                                    
                                }
                            }
                        }
                    }else{
                        ?>
                        <p style="text-transform:uppercase;color:black;">Upload a file first...</p>
                        <?php

                    }
                    
                ?>
            </div>
            <div class="main">
                <div class="slider"></div>
                <div class="btn">
                    <button class="private">Private</button>
                    <button class="public">Public</button>
                </div>
                <div class="form-sec">
                    <div class="pri">
                        <form action="private.php" method="post" enctype="multipart/form-data">
                            <span class="file">
                                <input type="file" name="document" required>
                            </span>
                            <span class="button">
                                <input type="submit" value="Upload" name="private">
                            </span>
                        </form>
                    </div>
                    <div class="pub">
                        <form action="public.php" method="post" enctype="multipart/form-data">
                            <select name="year" id="year" required>
                                <option value="" disabled selected hidden>Year</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                            <select name="course" id="course" required>
                                <option value="" disabled selected hidden >Course</option>
                                <option value="cs" >B.Sc. Computer Science</option>
                                <option value="ele">B.Sc. Electronics</option>
                                <option value="math">B.Sc. Mathematics</option>
                                <option value="imb">B.Sc. Biochemistry & Idustrial Microbiology</option>
                                <option value="bcom">B.Com with Computer Application</option>
                                <option value="english">B.A.English and Media Studies</option>
                            </select>
                            <select name="sem" id="sem" onchange="change(this.value)" required>
                                <option value="" selected disabled hidden>Select semester</option>
                                <option value="1">Sem 1</option>
                                <option value="2">Sem 2</option>
                                <option value="3">Sem 3</option>
                                <option value="4">Sem 4</option>
                                <option value="5">Sem 5</option>
                                <option value="6">Sem 6</option>
                            </select>
                            <select name="sub" id="sub" onchange="module(this.value)"  required>
                                <option value="" selected disabled hidden>Select semester first</option>
                            </select>
                            <select name="mod" id="mod" required>
                                <option value="" selected disabled hidden>Select subject first</option>
                            </select>
                            <span class="file">
                                <input type="file" name="document" required>
                            </span>
                            <span class="button">
                                <input type="submit" value="Upload" name="public">
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <script src="spnote.js"></script>
    </body>
</html>
<?php
}else{
    header("Location:../../../login.html");
    exit();
}

?>