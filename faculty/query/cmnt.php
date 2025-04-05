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
        <link rel="stylesheet" href="query.css">
        <script src="../../js/jquery-3.7.0.min.js"></script> 
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            function openp(){
                var x=document.getElementById("qpost");
                var y=document.getElementById("content");
                var z=document.getElementById("add");
                if(x.style.width=='40%'&&x.style.height=='50vh'&&y.style.filter=='blur(2px)'&&y.style.pointerEvents=='none'){
                    y.style.filter='blur(0px)';
                    x.style.width='0%';
                    x.style.height='0vh';
                    y.style.pointerEvents='auto';
                    z.style.transform='rotate(0deg)';
                }else{
                    y.style.pointerEvents='none';
                    y.style.filter='blur(2px)';   
                    x.style.width='40%';
                    x.style.height='50vh';
                    z.style.transform='rotate(90deg)';
                }
            }
            function upvote(idno,regno,op){
                $.post("cpost.php",{id:idno,regno:regno,op:op},function(){
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
                <div class="add" id="add" onclick="openp()">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="qpost" id="qpost">
                    <form action="cmntadd.php" method="post" enctype="multipart/form-data">
                        <textarea name="txt" cols="30" rows="15" required></textarea>
                        <span class="pbottom">
                            <input type="file" name="image" id="file">
                            <span class="button">
                                <input type="submit" name="submit" value="Post">
                            </span>
                        </span>
                    </form>
                </div>
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
                                        echo "<br><a href=\"../../student/query/images/".$rows['img']."\"><img src=\"../../student/query/images/".$rows['img']."\" style=\"width:400px;\"></a>";
                                    }
                                ?>
                            </p>
                        </div>
                        <div class="bottom">
                            <div class="bleft" id="bleft">
                                <i  <?php
                                    $rno=$_SESSION['idno'];
                                    $cmntid=$rows['cmntid'];
                                    $sqli="SELECT * FROM cvote WHERE regno='$rno' AND cmntid='$cmntid'";
                                    $resi=mysqli_query($con,$sqli);
                                    if(mysqli_num_rows($resi)==0){
                                        echo "class=\"fa fa-thumbs-o-up\"";
                                    }else{
                                        echo "class=\"fa fa-thumbs-up\"";
                                    }
                                ?> onclick="upvote(<?php echo $rows['cmntid'];?>,<?php echo $_SESSION['idno'];?>,'vote')"></i>
                                <?php
                                    echo $rows['vote'];
                                ?>
                            </div>
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