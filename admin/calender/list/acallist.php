<?php
session_start();
if(isset($_SESSION['idno'])){
    include_once "../../../connect.php";
    $cal="SELECT * FROM calendar";
    $results=mysqli_query($con,$cal);
?>

<html>
    <head>
        <title>List of Dates</title>
        <link rel="stylesheet" href="../../profile/profile.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../cal.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>List of Dates</p>
                <ul>
                    <li>
                        <a href="../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <h1>Dates details</h1>
                    <table>
                        <tr>
                            <th>Month</th>
                            <th>Day</th>
                            <th>Event</th>
                            <th>Link</th>
                        </tr>
                        <?php
                            while($rows=mysqli_fetch_assoc($results)){
                                $date=explode("/",$rows['date']);
                                $month=array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                        ?> 
                                <tr>
                                    <td><?php echo $month[$date[0]];?></td>
                                    <td><?php echo $date[1];?></td>
                                    <td><?php echo $rows['event'];?></td>
                                    <td><?php echo "<a href=\"".$rows['link']."\">".$rows['link']."</a>";?></td>
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