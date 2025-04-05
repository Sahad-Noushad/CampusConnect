<?php
session_start();
if(isset($_SESSION['idno'])){
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Qn</title>
        <script src="../../../../js/jquery-3.7.0.min.js"></script> 
        <link rel="stylesheet" href="../../../../student/note/snote.css">
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script>
            function change(sem){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                $.post("../../../../admin/note/pdf/asub.php", {sem:sem,course:course,year:year},function(data){
                    $("#sub").html(data);
                });
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../fqn.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Qn uploading</p>
            </div>
            <div class="content">
                    <form action="fqnup.php" method="post" enctype="multipart/form-data">
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
                        <select name="sub" id="sub" required>
                            <option value="" selected disabled hidden>Select semester first</option>
                        </select>
                        <span class="file">
                            <input type="file" name="document" required>
                        </span>
                        <span class="button">
                            <input type="submit" name="submit" value="Upload">
                        </span>
                    </form>
            </div>
        </div>
    </body>
</html>

<?php
}else{
    header("Location:../../../../login.html");
    exit();
}
?>