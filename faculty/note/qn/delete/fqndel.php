<?php
session_start();
    if(isset($_SESSION['idno'])){
        $dep=$_SESSION['dep'];
?>
<html>
    <head>
        <title>Qn Deletion</title>
        <link rel="stylesheet" href="../../../../admin/profile/profile.css">
        <script src="../../../../js/jquery-3.7.0.min.js"></script> 
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            window.onload=function(){
                var rel=sessionStorage.getItem("reloading");
                if(rel){
                    sessionStorage.removeItem("reloading");
                    var yval=sessionStorage.getItem("yearval");
                    var cval=sessionStorage.getItem("courseval");
                    $("#year").val(yval);
                    $("#course").val(cval);
                }
            }
            function delet(file){
                $.post("fqndel1.php",{file:file},function(data){
                    if(data==1){
                        alert("Deleted");
                        sessionStorage.setItem("reloading","true");
                        location.reload();
                    }
                    else{
                        alert("Error");
                    }
                });
            }
            function change(sem){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                $.post("../../../../admin/note/pdf/asub.php", {sem:sem,course:course,year:year},function(data){
                    $("#sub").html(data);
                });
            }
            function note(sub){
                var year=document.getElementById("year").value;
                var course=document.getElementById("course").value;
                var sem=document.getElementById("sem").value;
                sessionStorage.setItem("yearval",year);
                sessionStorage.setItem("courseval",course);
                $.post("qndel.php",{sub:sub,course:course,year:year,sem:sem,sub:sub},function(data){
                    $("#note").html(data);
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
                <p>Qn Deletion</p>
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
                            <option value="<?php echo $dep ?>" selected ><?php echo $dep ?></option>
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
                        <select name="sub" id="sub" onchange="note(this.value)"  required>
                            <option value="" selected disabled hidden>Select semester first</option>
                        </select>
                    </form>
                </section>
                <section>
                    <h1>Qn details</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>Year</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Subject</th>
                            <th>File name</th>
                            <th>Delete</th>
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