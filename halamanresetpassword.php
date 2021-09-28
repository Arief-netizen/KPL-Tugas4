<!-- 
    Nama        : Imam Arief Al Baihaqy
    NIM         : 19051397006
    Prodi/Kelas : D4 Manajemen Informatika/2019A
-->
<?php
session_start();
include"config/koneksi.php";
if (isset($_POST['resetpassword'])) {
    $username= $_POST['username'];
    $password= md5($_POST['password']);
    $repassword= md5($_POST['repassword']);

   if ($password !== $repassword) {
    echo "<script>window.alert('Password Tidak Sama!')</script>";
   }

   
   $cek_akun=mysqli_query($koneksi,"UPDATE user SET password='$password' where username = '$username'");
   $hasil_cek=mysqli_num_rows($cek_akun);
   if ($hasil_cek>0) {
       echo "<script>window.alert('Maaf Email Tidak Terdaftar!')</script>";
   }else {
       $resetpassword=mysqli_query($koneksi,"INSERT INTO user VALUE(NULL,'$password')");
       echo "<script>window.alert('Reset Password Berhasil! Silahkan Login')
       window.location='index.php'</script>";
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
        <!-- Form Login -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">Kembali ke Halaman Login</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Reset Password</h2>
                        <form method="POST" class="register-form" id="login-form">
                           <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" required="required" placeholder="Username Lama Anda"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" required="required" placeholder="Masukkan Password Baru"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="repassword" id="repassword" required="required" placeholder="Ulangi Password"/>
                            </div>
                             
                            <div class="form-group form-button">
                                <input type="submit" name="resetpassword" id="resetpassword" class="form-submit" value="RESET PASSWORD"/>
                            </div>
                        </form>
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