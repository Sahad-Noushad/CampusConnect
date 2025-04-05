<?php
    include_once "../connect.php";
    if(isset($_POST['submit'])){
        $value=$_POST['value'];
        $stud="SELECT * FROM student WHERE syear='$value' AND sapprove='1'";
        $results=mysqli_query($con,$stud);
        if(mysqli_num_rows($results)==0){
            $stud="SELECT * FROM student WHERE sregno='$value' AND sapprove='1'";
            $results=mysqli_query($con,$stud);
            if(mysqli_num_rows($results)==0){
                $stud="SELECT * FROM student WHERE sname LIKE '%$value%' AND sapprove='1'";
                $results=mysqli_query($con,$stud);
                if(mysqli_num_rows($results)==0){
                    $stud="SELECT * FROM student WHERE scourse='$value' AND sapprove='1'";
                    $results=mysqli_query($con,$stud);
                    if(mysqli_num_rows($results)==0){
                        $stud="SELECT * FROM student WHERE semail LIKE '%$value%' AND sapprove='1'";
                        $results=mysqli_query($con,$stud);
                        if(mysqli_num_rows($results)==0){
                            $stud="SELECT * FROM student WHERE gen LIKE '$value' AND sapprove='1'";
                            $results=mysqli_query($con,$stud); 
                        }
                    }
                }
            }
        }
    }
?>

<html>
    <head>
        <title>Profile Search</title>
        <link rel="stylesheet" href="../admin/profile/profile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../admin/profile/list/aprofilelist.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Profile Search</p>
                <ul>
                    <li>
                        <a href="../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <h1>Student detials</h1>
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