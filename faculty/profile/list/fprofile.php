<?php
session_start();
if(isset($_SESSION['idno'])){
    include_once "../../../connect.php";
    $dep=$_SESSION['dep'];
    $stud="SELECT * FROM student WHERE sapprove='1' AND scourse='$dep' ORDER BY sregno ASC";
    $results=mysqli_query($con,$stud);
?>

<html>
    <head>
        <title>Student List</title>
        <link rel="stylesheet" href="../../../admin/profile/profile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../../faculty.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Student List</p>
                <ul>
                    <li>
                        <a href="../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <h1>Student details</h1>
                    <table>
                        <tr>
                            <th>Register number</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Email</th>
                        </tr>
                        <?php
                            while($rows=mysqli_fetch_assoc($results)){
                        ?> 
                                <tr>
                                    <td><?php echo $rows['sregno'];?></td>
                                    <td><?php echo $rows['sname'];?></td>
                                    <td><?php echo $rows['gen'];?></td>
                                    <td><?php echo $rows['scourse'];?></td>
                                    <td><?php echo $rows['syear'];?></td>
                                    <td><?php echo $rows['semail'];?></td>
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