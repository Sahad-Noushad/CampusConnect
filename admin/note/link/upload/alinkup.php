<?php
    session_start();
    if(isset($_SESSION['idno'])){
?>
<html>
    <head>
        <title>Link Upload</title>
        <script src="../../../../js/jquery-3.7.0.min.js"></script> 
        <link rel="stylesheet" href="alink.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            function change(sem){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                $.post("../../pdf/asub.php", {sem:sem,course:course,year:year},function(data){
                    $("#sub").html(data);
                });
            }
            function module(sub){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                var sem=document.getElementById("sem").value;
                $.post("../../pdf/amod.php", {sub:sub,course:course,year:year,sem:sem},function(data){
                    $("#mod").html(data);
                });
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../alink.php"><i class="fas fa-arrow-circle-left">Back</i></a></li>
                </ul>
                <p>Link Upload</p>
            </div>
            <div class="main">
                <div class="form-sec">
                    <form action="linkup.php" method="post">
                        <select name="link" id="link" required>
                            <option value="" disabled selected hidden>Type</option>
                            <option value="yt">Youtube</option>
                            <option value="st">Site</option>
                        </select>
                        <input type="text" name="name" id="name" placeholder="Only for site option">
                        <select name="year" id="year" required>
                            <option value="" disabled selected hidden>Year</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                        <select name="course" id="course" required>
                            <option value="" disabled selected hidden >Course</option>
                            <option value="cs" >B.Sc. Computer Science</option>
                            <option value="ele">B.Sc. Electronics</option>
                            <option value="math">B.Sc. Mathematics</option>
                            <option value="imb">B.Sc. Biochemistry & Idustrial Microbiology</option>
                            <option value="bcom">B.Com with Computer Application</option>
                            <option value="english">B.A.English and Media Studies</option>
                        </select>
                        <select name="sem" id="sem" onchange="change(this.value)" required>
                            <option value="" selected disabled hidden>Select semester</option>
                            <option value="1">Sem 1</option>
                            <option value="2">Sem 2</option>
                            <option value="3">Sem 3</option>
                            <option value="4">Sem 4</option>
                            <option value="5">Sem 5</option>
                            <option value="6">Sem 6</option>
                        </select>
                        <select name="sub" id="sub" onchange="module(this.value)"  required>
                            <option value="" selected disabled hidden>Select semester first</option>
                        </select>
                        <select name="mod" id="mod" required>
                            <option value="" selected disabled hidden>Select subject first</option>
                        </select>
                        <textarea name="linkadd" id="linkadd" cols="95" rows="10" placeholder="Paste link here..."></textarea>
                        <span class="button">
                            <input type="submit" value="Upload" name="submit">
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    }
    else{
        header("Location:../../../../login.html");
        exit();
    }
?>