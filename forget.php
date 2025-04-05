<?php
    include_once "connect.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'D:\xampp\vendor\autoload.php';
    require "D:/xampp/vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require "D:/xampp/vendor/phpmailer/phpmailer/src/SMTP.php";
    
    
    if(isset($_POST['submit'])){
        if(isset($_POST['email'])){
            function validate($data){
                $data = filter_var($data, FILTER_SANITIZE_EMAIL);
                $data = filter_var($data, FILTER_VALIDATE_EMAIL);
                return $data;
            }
            $email=validate($_POST['email']);

            $sql="SELECT * FROM login WHERE email='$email'";
            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1){
                $row=mysqli_fetch_assoc($result);
                $send_to=$row['email'];
                $pass=$row['password'];
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
                    $mail->Subject = "Password recovery";
                    $mail->Body = "Hello,\nYour password is {$pass}.You can now login with this password :).";
                    $mail->send();
                    echo "Mail has been sent successfully!";
                }
                catch(Exception $e){
                    echo "Message could not be sent.Mailer Error : {$mail->ErrorInfo}";
                }

            }
            else{
                echo "Incorrect email";
            }
        }
    }
?>