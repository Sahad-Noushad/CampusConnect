<?php
    include_once "../connect.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'D:\xampp\vendor\autoload.php';
    require "D:/xampp/vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require "D:/xampp/vendor/phpmailer/phpmailer/src/SMTP.php";

    $idno=$_GET['idno'];
    $sql1="SELECT * FROM faculty WHERE fidno='$idno'";
    $results=mysqli_query($con,$sql1);
    $rows=mysqli_fetch_assoc($results);
    $sql2="UPDATE faculty SET fapprove='1' WHERE fidno='$idno'";
    $tidno=$rows['fidno'];
    $tpass=$rows['fpassword'];
    $temail=$rows['femail'];
    $sql3="INSERT INTO login (idno,password,role,email) VALUES ('$tidno','$tpass','faculty','$temail')";
    if(mysqli_query($con,$sql1)&&mysqli_query($con,$sql2)&&mysqli_query($con,$sql3)){

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