<?php
session_start();
    if(isset($_SESSION['idno'])){
        $dep=$_SESSION['dep'];
?>
<html>
    <head>
        <title>Note List</title>
        <link rel="stylesheet" href="../../../profile/profile.css">
        <script src="../../../../js/jquery-3.7.0.min.js"></script> 
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function change(sem){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                $.post("../asub.php", {sem:sem,course:course,year:year},function(data){
                    $("#sub").html(data);
                });
            }
            function module(sub){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                var sem=document.getElementById("sem").value;
                $.post("../amod.php", {sub:sub,course:course,year:year,sem:sem},function(data){
                    $("#mod").html(data);
                });
            }
            function note(mod){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                var sem=document.getElementById("sem").value;
                var sub=document.getElementById("sub").value;
                $.post("notelist.php",{sub:sub,course:course,year:year,sem:sem,mod:mod},function(data){
                    $("#note").html(data);
                });
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../anote.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Note List</p>
                <ul>
                    <li>
                        <a href="../../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <form action=" " method="post" >
                        <select name="year" id="year" required>
                            <option value="" disabled selected hidden>Year</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                        <select name="course" id="course" required>
                            <option value="<?php echo $dep ?>" selected ><?php echo $dep?></option>
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
                        <select name="mod" id="mod" onchange="note(this.value)" required>
                            <option value="" selected disabled hidden>Select subject first</option>
                        </select>
                    </form>
                </section>
                <section>
                    <h1>Note details</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>Year</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Subject</th>
                            <th>Module</th>
                            <th>File name</th>
                        </tr>
                        </thead>
                        <tbody id="note">

                        </tbody>
                    </table>
                </section>
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