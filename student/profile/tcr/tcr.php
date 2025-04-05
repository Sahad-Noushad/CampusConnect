<?php
    session_start();
    if(isset($_SESSION['idno'])){
        include_once "../../../connect.php";
        $idno=$_SESSION['idno'];
        $sql1="SELECT scourse FROM student WHERE sregno='$idno'";
        $res1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_assoc($res1);
        $dep=$row1['scourse'];
        $sql2="SELECT fname,fphone,femail FROM faculty WHERE fdep='$dep'";
        $res2=mysqli_query($con,$sql2);
?>

<html>
    <head>
        <title>Teacher</title>
        <link rel="stylesheet" href="tcr.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../sprofile.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Teacher</p>
            </div>
            <div class="content">
                <section>
                    <h1>Teacher Details</h1>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Phone number</th>
                            <th>Email</th>
                        </tr>
                        <?php
                            while ($row2=mysqli_fetch_assoc($res2)) {
                        ?>
                            <tr>
                                <td><?php echo $row2['fname'];?></td>
                                <td><?php echo $row2['fphone'];?></td>
                                <td><a href="mailto:<?php echo $row2['femail']?> "><?php echo $row2['femail'];?></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </section>
            </div>
        </div>
    </body>
</html>
<?php
    }else{
        header("Location:../../../login.html");
        exit();
    }
?>