<?php
session_start();
if(isset($_SESSION['idno'])){
    $dep=$_SESSION['dep'];
    include_once "../../../../connect.php";
    $yt="SELECT * FROM ytlink WHERE course='$dep' ORDER BY Sino ASC";
    $yres=mysqli_query($con,$yt);
    $st="SELECT * FROM stlink WHERE course='$dep' ORDER BY Sino ASC";
    $sres=mysqli_query($con,$st);
?>

<html>
    <head>
        <title>Link Deletion</title>
        <link rel="stylesheet" href="../../../../admin/profile/profile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../flink.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Link Deletion</p>
                <ul>
                    <li>
                        <a href="../../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <h1>Youtube Link details</h1>
                    <table>
                        <tr>
                            <th>Sino</th>
                            <th>Year</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Subject</th>
                            <th>Module</th>
                            <th>Link</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                            while($rows=mysqli_fetch_assoc($yres)){
                        ?> 
                            <tr>
                                <td><?php echo $rows['Sino'];?></td>
                                <td><?php echo $rows['year'];?></td>
                                <td><?php echo $rows['course'];?></td>
                                <td><?php echo $rows['sem'];?></td>
                                <td><?php echo $rows['sub'];?></td>
                                <td><?php echo $rows['module'];?></td>
                                <td><a href="<?php echo $rows['link'];?>"><?php echo $rows['link'];?></a></td>
                                    <td>
                                        <a href="ytlinkdel.php?sino=<?php echo $rows['Sino'];?>"><i class="fa fa-trash"  style="color:red"></i></a>
                                    </td>
                            </tr>
                        <?php    
                            }
                        ?>
                    </table>
                </section>
                <section>
                    <h1>Site Link details</h1>
                    <table>
                        <tr>
                            <th>Sino</th>
                            <th>Year</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Subject</th>
                            <th>Module</th>
                            <th>Link</th>
                            <th>Name</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                            while($rows=mysqli_fetch_assoc($sres)){
                        ?> 
                            <tr>
                                <td><?php echo $rows['Sino'];?></td>
                                <td><?php echo $rows['year'];?></td>
                                <td><?php echo $rows['course'];?></td>
                                <td><?php echo $rows['sem'];?></td>
                                <td><?php echo $rows['sub'];?></td>
                                <td><?php echo $rows['module'];?></td>
                                <td><a href="<?php echo $rows['link'];?>"><?php echo $rows['link'];?></a></td>
                                <td>
                                    <a href="stlinkdel.php?sino=<?php echo $rows['Sino'];?>"><i class="fa fa-trash" style="color:red"></i></a>
                                </td>
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