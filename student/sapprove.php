<?php
    include_once "../connect.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'D:\xampp\vendor\autoload.php';
    require "D:/xampp/vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require "D:/xampp/vendor/phpmailer/phpmailer/src/SMTP.php";

    $regno=$_GET['regno'];
    $sql1="SELECT * FROM student WHERE sregno='$regno'";
    $results=mysqli_query($con,$sql1);
    $rows=mysqli_fetch_assoc($results);
    $sql2="UPDATE student SET sapprove='1' WHERE sregno='$regno'";
    $tidno=$rows['sregno'];
    $tpass=$rows['spassword'];
    $temail=$rows['semail'];
    $sql3="INSERT INTO login (idno,password,role,email) VALUES ('$tidno','$tpass','student','$temail')";
    $sql4="INSERT INTO attendance (regno,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece) VALUES ('$regno','0','0','0','0','0','0','0','0','0','0','0','0')";
    if(mysqli_query($con,$sql1)&&mysqli_query($con,$sql2)&&mysqli_query($con,$sql3)&&mysqli_query($con,$sql4)){
        function validate($data){
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            $data = filter_var($data, FILTER_VALIDATE_EMAIL);
            return $data;
        }
        $email=validate($temail);

        $send_to=$email;
        $mail = new PHPMailer(true);

        try{
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->Username = "campusconnectproject@gmail.com";
            $mail->Password = "gwpqskqtjvsptgcm";
            $mail->setFrom("campusconnectproject@gmail.com", "Campusconnect");
            $mail->addAddress($send_to);
            $mail->Subject = "Registration Confirmed";
            $mail->Body = "Hello,\nYour registration has been successfully verified, and you can now login :).";
            $mail->send();
            echo "Mail has been sent successfully!";
        }
        catch(Exception $e){
            echo "Message could not be sent.Mailer Error : {$mail->ErrorInfo}";
        }

        header("Location:../admin/profile/verify/aprofilever.php");
    }else{
        echo "Error ".$sql1.":-".mysqli_error($con);
        echo "Error ".$sql2.":-".mysqli_error($con);
        echo "Error ".$sql3.":-".mysqli_error($con);
    }
    mysqli_close($con);
?>