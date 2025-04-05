<?php
session_start();
    if(isset($_SESSION['idno'])){
?>
<html>
    <head>
        <title>Note Verification</title>
        <link rel="stylesheet" href="../../../../admin/profile/profile.css">
        <script src="../../../../js/jquery-3.7.0.min.js"></script> 
        <script src="https://kit.fontawesome.com/3ff269eea1.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function verify(file,op,dir,sino){
                $.post("verify.php",{file:file,op:op,dir:dir,sino:sino},function(data){
                    if(data==1){
                        alert("Success");
                        sessionStorage.setItem("reloading","true");
                        location.reload();
                    }
                    else{
                        alert("Error");
                    }
                });
            }
            window.onload=function(){
                $.post("notelist.php",function(data){
                    $("#note").html(data);
                })
            }
        </script>
    </head>
    <body>
        <div class="back">
            <div class="nav">
                <ul>
                    <li><a href="../fnote.php"><i class="fas fa-arrow-circle-left"></i>Back</a></li>
                </ul>
                <p>Note Verification</p>
                <ul>
                    <li>
                        <a href="../../../../logout.php">Log out</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <section>
                    <h1>Note details</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>Year</th>
                            <th>Course</th>
                            <th>Sem</th>
                            <th>Subject</th>
                            <th>Module</th>
                            <th>File name</th>
                            <th>Delete</th>
                            <th>Verify</th>
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