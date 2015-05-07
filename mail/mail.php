<?php
require("PHPMailer_5.2.4/class.phpmailer.php");

function sendMail($email,$title,$msg)
{
    $mail = new PHPMailer();

// ---------- adjust these lines ---------------------------------------
    $mail->Username = "noreply.revconf@gmail.com"; // your GMail user name
    $mail->Password = "0797038556";
    $mail->AddAddress($email); // recipients email
    $mail->FromName = "RevConf"; // readable name

    $mail->Subject = "$title";
    $mail->Body =$msg;
    $mail->IsHTML(true);
//-----------------------------------------------------------------------

    $mail->Host = "ssl://smtp.gmail.com"; // GMail
    $mail->Port = 465;
    $mail->IsSMTP(); // use SMTP
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->From = $mail->Username;
    if (!$mail->Send())
        echo "Mailer Error: " . $mail->ErrorInfo;
    else
        echo "Message has been sent";

}


?>