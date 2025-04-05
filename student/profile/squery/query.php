<?php
    session_start();
    if(isset($_SESSION['idno'])){
        include_once "../../../connect.php";
        $idno=$_SESSION['idno'];
        $sql="SELECT * FROM query WHERE regno=$idno ORDER BY vote DESC";
        $res=mysqli_query($con,$sql);
?>

<html>
    <head>
        <title>Query</title>
        <link rel="stylesheet" href="../../query/query.css">
        <script src="../../../js/jquery-3.7.0.min.js"></script> 
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
                $.post("../../query/post.php",{id:idno,regno:regno,op:op},function(){
                    location.reload();
                });
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../sprofile.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Query</p>
            </div>
            <div class="main">
                <div class="add" id="add" onclick="openp()">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="qpost" id="qpost">
                    <form action="../../query/qpost.php" method="post" enctype="multipart/form-data">
                        <span class="subject">
                            <input type="text" name="sub" placeholder="Subject">
                        </span>
                        <textarea name="txt" cols="30" rows="15" required></textarea>
                        <span class="pbottom">
                            <input type="file" name="image" id="file" title="Please upload multiple images as a pdf.">
                            <span class="button">
                                <input type="submit" name="submit" value="Post">
                            </span>
                        </span>
                    </form>
                </div>
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
                                            echo "<br><br><embed src=\"../../query/images/".$row['img']."\" width=\"500px\" height=\"400px\"><br><br><a href=\"../../query/images/".$row['img']."\" style=\"text-decoration:none;color:white;\">Open Pdf</a>";
                                        }
                                        else{
                                            echo "<br><br><a href=\"../../query/images/".$row['img']."\"><img src=\"../../query/images/".$row['img']."\" width=\"400px\"></a>";
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
                                <i  <?php
                                    $rno=$_SESSION['idno'];
                                    $qrid=$row['queryid'];
                                    $sqli="SELECT * FROM vote WHERE regno='$rno' AND queryid='$qrid'";
                                    $resi=mysqli_query($con,$sqli);
                                    if(mysqli_num_rows($resi)==0){
                                        echo "class=\"fa fa-thumbs-o-up\"";
                                    }else{
                                        echo "class=\"fa fa-thumbs-up\"";
                                    }
                                ?> onclick="upvote(<?php echo $row['queryid'];?>,<?php echo $_SESSION['idno'];?>,'vote')"></i>
                                <?php
                                    echo $row['vote'];
                                ?>
                            </div>
                            <div class="bright">
                                <?php
                                    if($row['regno']==$_SESSION['idno']){
                                        echo "<i class=\"fa fa-trash-o\" style=\"color: rgba(255,0,0,0.9);font-size: 30px;padding-right: 10px;\" onclick=\"upvote(".$row['queryid'].",".$_SESSION['idno'].",'del')\"></i>";
                                    }
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