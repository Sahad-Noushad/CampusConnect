<?php
session_start();
if(isset($_SESSION['idno'])){
    include_once "../../../connect.php";
    $cal="SELECT * FROM calendar";
    $results=mysqli_query($con,$cal);
?>

<html>
    <head>
        <title>Add Dates</title>
        <link rel="stylesheet" href="acalup.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../cal.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Add Dates</p>
                <ul>
                    <li>
                        <a href="../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <h1>Add Date</h1>
                    <form action="calup.php" method="post">
                        <select name="month" id="month" required>
                            <option value="" selected disabled hidden>Select Month</option>
                            <option value="0">January</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                            <option value="4">May</option>
                            <option value="5">June</option>
                            <option value="6">July</option>
                            <option value="7">August</option>
                            <option value="8">September</option>
                            <option value="9">October</option>
                            <option value="10">November</option>
                            <option value="11">December</option>
                        </select>
                        <input type="number" name="day" id="day" placeholder="Day" required>
                        <input type="text" name="event" id="event" placeholder="Event" required>
                        <input type="text" name="link" id="link" placeholder="Link">
                        <span class="button">
                            <input type="submit" value="Upload" name="submit">
                        </span>
                    </form>
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