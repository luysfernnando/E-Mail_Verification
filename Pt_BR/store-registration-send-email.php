<?php
if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    include "db.php";

    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");

    $row= mysqli_num_rows($result);

    if($row < 0)
    {
      
       $token = md5($_POST['email']).rand(10,9999);

       mysqli_query($conn, "INSERT INTO users(nome, email, link_verificacao_email ,password) VALUES('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . md5($_POST['password']) . "')");

        $link = "<a href='localhost/email-verification/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click e Verifique seu Email</a>";

        require_once('phpmail/PHPMailerAutoload.php');

        $mail = new PHPMailer();

        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;                  
        // GMAIL username
        $mail->Username = "seu_email_id@gmail.com";
        // GMAIL password
        $mail->Password = "seu_gmail_password";
        $mail->SMTPSecure = "ssl";  
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From='seu_gmail_id@gmail.com';
        $mail->FromName='seu_name';
        $mail->AddAddress('reciever_email_id', 'reciever_name');
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body    = 'Click nesse Link pra verificar seu Email '.$link.'';
        if($mail->Send())
        {
          echo "Check sua caixa de entrada e Click no link de verificação do email.";
        }
        else
        {
          echo "Erro no E-mail - >".$mail->ErrorInfo;
        }
    }
    else
    {
      echo "Você já se registrou com a gente. Confira sua caixa de entrada e verifique o email.";
    }
}
?>