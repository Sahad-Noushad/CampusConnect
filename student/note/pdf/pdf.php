<?php
    session_start();
    if(isset($_SESSION['idno'])){
        $dir='../../../study/notes/public/'.$_SESSION['year'].'/'.$_SESSION['course'].'/'.$_SESSION['sem'].'/'.$_SESSION['sub'];
        $num=count(scandir($dir))-2;
?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Notes</title>
            <link rel="stylesheet" href="pdf.css">
            <script src="../../../js/jquery-3.7.0.min.js"></script>
            <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script> 
            <script>
                function change(mod){
                    $.post("pdfright.php",{mod:mod},function(data){
                        $("#right").html(data);
                    });
                }
            </script>
        </head>
        <body>
            <div class="back">
                <div class="nav">
                    <ul>
                        <li><a href="../noteslct.php" ><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                    </ul>
                    <p>Notes</p>
                </div>
                <div class="content">
                    <div class="left">
                        <?php
                            for ($i=1;$i<=$num;$i++) { 
                                echo "
                                    <div class=\"mod\" tabindex=\"".$i."\" data-value=".$i." onclick=\"change(this.dataset.value)\">
                                        Module ".$i."
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                    <div class="right" id="right">

                    </div>
                </div>
            </div>
        </body>
    </html>

<?php
    }
    else{
        header("Location:../../../login.html");
        exit();
    }
?>