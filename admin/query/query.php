<?php
    session_start();
    if(isset($_SESSION['idno'])){
        $dep=$_SESSION['dep'];
        include_once "../../connect.php";
        $sql="SELECT * FROM query WHERE department='$dep' ORDER BY vote DESC";
        $res=mysqli_query($con,$sql);
?>

<html>
    <head>
        <title>Query</title>
        <link rel="stylesheet" href="../../student/query/query.css">
        <script src="../../js/jquery-3.7.0.min.js"></script> 
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            function upvote(idno,regno,op){
                $.post("../../student/query/post.php",{id:idno,regno:regno,op:op},function(){
                    location.reload();
                });
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../admin.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Query</p>
            </div>
            <div class="main">
                <div class="content" id="content">
                    <?php
                        if(mysqli_num_rows($res)==0){
                        ?>
                            <p style="text-transform:uppercase;position:relative;left:40%;top:40%;">No query posted...</p>
                        <?php
                        }else{
                        while($row=mysqli_fetch_assoc($res)){
                    ?>
                    <div class="query">
                        <div class="top">
                            <div class="left">
                                <div class="name">
                                    <p><?php echo $row['name'];?></p>
                                </div>
                                <div class="sub">
                                    <p>Subject : <?php echo $row['sub'];?></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="date">
                                    <p><?php echo $row['date'];?></p>
                                </div>
                                <div class="time">
                                    <p><?php echo $row['time'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <p>
                                <?php 
                                    echo $row['content'];
                                    if($row['img']!='NULL'){
                                        $ext=strtolower(pathinfo($row['img'],PATHINFO_EXTENSION));
                                        if($ext=="pdf"){
                                            echo "<br><br><embed src=\"../../student/query/images/".$row['img']."\" width=\"500px\" height=\"400px\"><br><br><a href=\"../../student/query/images/".$row['img']."\" style=\"text-decoration:none;color:white;\">Open Pdf</a>";
                                        }
                                        else{
                                            echo "<br><br><a href=\"../../student/query/images/".$row['img']."\"><img src=\"../../student/query/images/".$row['img']."\" width=\"400px\"></a>";
                                        }
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="bottom">
                            <div class="bleft" id="bleft">
                                <a href="cmnt.php?qid=<?php echo $row['queryid'];?>" style="text-decoration: none;color:black;">
                                    <i class="far fa-comment" ></i>
                                <?php
                                    echo $row['cmnt'];
                                ?>
                                </a>
                            </div>
                            <div class="bright">
                                <?php
                                    echo "<i class=\"fa fa-trash-o\" style=\"color: rgba(255,0,0,0.9);font-size: 30px;padding-right: 10px;\" onclick=\"upvote(".$row['queryid'].",".$_SESSION['idno'].",'del')\"></i>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>

<?php
    }else{
        header("Location:../../login.html");
        exit();
    }
?>