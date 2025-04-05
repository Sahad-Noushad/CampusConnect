<?php
    session_start();
    if(isset($_SESSION['idno'])){
        include_once "../../connect.php";
        $qid=$_GET['qid'];
        $_SESSION['qid']=$qid;
        $sql="SELECT * FROM query WHERE queryid='$qid'";
        $res=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($res);
        $sql1="SELECT * FROM comment WHERE queryid='$qid' ORDER BY vote DESC";
        $res1=mysqli_query($con,$sql1);
?>

<html>
    <head>
        <title>Comment</title>
        <link rel="stylesheet" href="../../student/query/query.css">
        <script src="../../js/jquery-3.7.0.min.js"></script> 
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            function upvote(idno,regno,op){
                $.post("../../student/query/cpost.php",{id:idno,regno:regno,op:op},function(){
                    location.reload();
                });
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="query.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>query</p>
            </div>
            <div class="main">
                <div class="content" id="content">
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
                                        echo "<br><a href=\"../../student/query/images/".$row['img']."\"><img src=\"../../student/query/images/".$row['img']."\" style=\"width:400px;\"></a>";
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
                        if(mysqli_num_rows($res1)!=0){
                            while($rows=mysqli_fetch_assoc($res1)){
                    ?>
                    <div class="comment">
                        <div class="top">
                            <div class="left">
                                <div class="name">
                                    <p><?php echo $rows['name'];?></p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="date">
                                    <p><?php echo $rows['date'];?></p>
                                </div>
                                <div class="time">
                                    <p><?php echo $rows['time'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="center">
                            <p>
                                <?php 
                                    echo $rows['content'];
                                    if($rows['img']!='NULL'){
                                        echo "<br><a href=\".../../student/query/images/".$rows['img']."\"><img src=\"../../student/query/images/".$rows['img']."\" style=\"width:400px;\"></a>";
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="bottom">
                            <div class="bright">
                                <?php
                                    echo "<i class=\"fa fa-trash-o\" style=\"color: rgba(255,0,0,0.9);font-size: 30px;padding-right: 10px;\" onclick=\"upvote(".$rows['cmntid'].",".$_SESSION['idno'].",'del')\"></i>";
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