<?php
session_start();
if(isset($_SESSION['idno'])){
?>


<html>
    <head>
        <title>attendance</title>
        <link rel="stylesheet" href="attandance.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../aprofile.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>attendance</p>
                <ul>
                    <li>
                        <a href="../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <form action="attandance1.php" method="post" enctype="multipart/form-data">
                    <select name="month" id="month" required>
                        <option value="" disabled selected hidden >Month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <span class="file">
                        <input type="file" name="excel" required>
                    </span>
                    <span class="button">
                        <input type="submit" name="upload" value="Upload">
                    </span>
                </form>
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