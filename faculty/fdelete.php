<?php
    include_once "../connect.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'D:\xampp\vendor\autoload.php';
    require "D:/xampp/vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require "D:/xampp/vendor/phpmailer/phpmailer/src/SMTP.php";
    $idno=$_GET['idno'];

    $sql3="SELECT femail FROM faculty WHERE fidno='$idno'";
    $result=mysqli_query($con,$sql3);
    $row=mysqli_fetch_assoc($result);

    $temail=$row['femail'];

    $sql1="DELETE FROM faculty WHERE fidno='$idno'";
    $sql1="DELETE FROM login WHERE idno='$idno'";
    if(mysqli_query($con,$sql1)&&mysqli_query($con,$sql2)){

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
            $mail->Subject = "Account Terminated";
            $mail->Body = "Hello,\nYour account has been terminated due to a violation of our terms and conditions.For more information, please contact admin.";
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
    }
    mysqli_close($con);
?>