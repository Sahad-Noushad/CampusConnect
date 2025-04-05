<?php
    session_start();
    if(isset($_SESSION['idno'])){
        include_once "../../../connect.php";
        $year=$_SESSION['year'];
        $course=$_SESSION['course'];
        $sem=$_SESSION['sem'];
        $sub=$_SESSION['sub'];
?>

<html>
    <head>
        <title>Links</title>
        <link rel="stylesheet" href="slink.css">
        <script src="../../../js/jquery-3.7.0.min.js"></script>
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            function change(mod){
                $.post("ytlink.php",{mod:mod},function(data){
                    $("#yt").html(data);
                })
                $.post("stlink.php",{mod:mod},function(data){
                    $("#st").html(data);
                })
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../noteslct.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Links</p>
            </div>
            <div class="content">
                <div class="top">
                    <?php
                        $sql1="SELECT DISTINCT module FROM ytlink WHERE year='$year' AND course='$course' AND sem='$sem' AND sub='$sub'";
                        $res1=mysqli_query($con,$sql1);
                        $row1=mysqli_num_rows($res1);
                        if($row1>0){
                            for($i=1;$i<=$row1;$i++){
                                echo "
                                    <div class=\"mod\" tabindex=\"".$i."\" data-value=".$i." onclick=\"change(this.dataset.value)\">
                                        Module ".$i."
                                    </div>
                                ";
                            }
                        }else{
                            echo "<p style=\"text-transform:uppercase;\">No links are currently available</p>";
                        }
                    ?>
                </div>
                <div class="main">
                    <div class="left">
                        <p>Youtube</p>
                        <div class="yt" id="yt">

                        </div>
                    </div>
                    <div class="right">
                        <p>Sites</p>
                        <div class="st" id="st">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    }
    else{
        header("Location:../../../login.html");
    }
?>