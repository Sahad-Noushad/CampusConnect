<?php
    session_start();
    if(isset($_SESSION['idno'])){
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Notes</title>
        <script src="../../js/jquery-3.7.0.min.js"></script> 
        <link rel="stylesheet" href="snote.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            function change(sem){
                $.post("ssub.php", {option_value:sem},function(data){
                    $("#sub").html(data);
                });
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../../home.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Notes</p>
            </div>
            <div class="content">
                    <form action="noteslct1.php" method="post">
                        <select name="sem" id="sem" onchange="change(this.value)" required>
                            <option value="" selected disabled hidden>Select semester</option>
                            <option value="1">Sem 1</option>
                            <option value="2">Sem 2</option>
                            <option value="3">Sem 3</option>
                            <option value="4">Sem 4</option>
                            <option value="5">Sem 5</option>
                            <option value="6">Sem 6</option>
                        </select>
                        <select name="sub" id="sub" required>
                            <option value="" selected disabled hidden>Select semester first</option>
                        </select>
                        <span class="button">
                            <input type="submit" name="submit" value="Next">
                        </span>
                    </form>
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