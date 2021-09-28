<!-- 
    Nama        : Imam Arief Al Baihaqy
    NIM         : 19051397006
    Prodi/Kelas : D4 Manajemen Informatika/2019A
-->
<?php

require('PHPMailer/PHPMailerAutoload.php');
require('credential.php');      

session_start();
include"config/koneksi.php";
if (isset($_POST['forgotpassword'])) {
   $email = $_POST['email'] ;

   $token = md5(rand('10000', '99999'));
   $status = "active";

   if ($email !== $email) {
        echo "<script>window.alert('Password Tidak Sama!')</script>";
   }else{
        $forgotpassword = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($koneksi,$forgotpassword);

        $last_id = mysqli_insert_id($koneksi);
        $url = 'http://'.$_SERVER['SERVER_NAME'].'/loginregister/halamanresetpassword.php?id='.$last_id.'&token='.$token;

        $output = '<div>Verifikasi reset password berhasil, silahkan klik link berikut untuk membuat password baru anda <br>'.$url.'</div>';

        if ($result == true ) {
            
            $mail = new PHPMailer;

            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(EMAIL, 'Arief Company 2021');
            $mail->addAddress($email);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
           // $mail->addBCC('bcc@example.com');

           // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
           // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            

            $mail->Subject = 'Konfirmasi Reset Password';
            $mail->Body    = $output;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo "<script>window.alert('Verifikasikan Melalui Email Anda Untuk Reset Password')</script>";
            }

        }
   }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300;url=index.php"/>
    <title>Arief_Reset Password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">
        <!-- Form Register -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        
                        <h2 class="form-title">Reset Password</h2>
                            <div class="alert alert-successful"> <?php if (isset($msg)) {
                                echo $msg;
                            } ?>
                            </div>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" required="required" placeholder="E-mail"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="forgotpassword" id="forgotpassword" class="form-submit" value="RESET PASSWORD"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">Kembali ke Halaman Login</a>
                    </div>
                </div>
            </div>
        </section>

        

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<!-- 
    Nama        : Imam Arief Al Baihaqy
    NIM         : 19051397006
    Prodi/Kelas : D4 Manajemen Informatika/2019A
-->