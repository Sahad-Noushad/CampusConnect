<?php
    include_once "../connect.php";
    if(isset($_POST['submit'])){
        $value=$_POST['value'];
        $stud="SELECT * FROM faculty WHERE fphone='$value' AND fapprove='1'";
        $results=mysqli_query($con,$stud);
        if(mysqli_num_rows($results)==0){
            $stud="SELECT * FROM faculty WHERE fidno='$value' AND fapprove='1'";
            $results=mysqli_query($con,$stud);
            if(mysqli_num_rows($results)==0){
                $stud="SELECT * FROM faculty WHERE fname LIKE '%$value%' AND fapprove='1'";
                $results=mysqli_query($con,$stud);
                if(mysqli_num_rows($results)==0){
                    $stud="SELECT * FROM faculty WHERE fdep='$value' AND fapprove='1'";
                    $results=mysqli_query($con,$stud);
                    if(mysqli_num_rows($results)==0){
                        $stud="SELECT * FROM faculty WHERE femail LIKE '%$value%' AND fapprove='1'";
                        $results=mysqli_query($con,$stud);
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
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../admin/profile/aprofile.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Profile search</p>
                <ul>
                    <li>
                        <a href="../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <h1>faculty detials</h1>
                    <table>
                        <tr>
                            <th>Id number</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Phone number</th>
                            <th>Email</th>
                        </tr>
                        <?php
                            while($rows=mysqli_fetch_assoc($resultf)){
                        ?> 
                                <tr>
                                    <td><?php echo $rows['fidno'];?></td>
                                    <td><?php echo $rows['fname'];?></td>
                                    <td><?php echo $rows['fdep'];?></td>
                                    <td><?php echo $rows['fphone'];?></td>
                                    <td><?php echo $rows['femail'];?></td>
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