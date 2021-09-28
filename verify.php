<!-- 
    Nama        : Imam Arief Al Baihaqy
    NIM         : 19051397006
    Prodi/Kelas : D4 Manajemen Informatika/2019A
-->
<?php

echo "<script>window.alert('Selamat Verifikasi Akun Berhasil, Silahkan Login!')</script>";

session_start();
include"config/koneksi.php";
if (isset($_POST['login'])) {
   $username = $_POST['username'] ;
   $password= md5($_POST['password']);
   $level = $_POST['level'];

   $login=mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password' AND level='$level'");
   $cek=mysqli_num_rows($login);

   if ($cek==1) {
    session_start();
    $_SESSION['username'] = $cek['username'];
    $_SESSION['password'] = $cek['password'];
    $_SESSION['level'] = $cek['level'];

        //uji level user
        if ($level == "Mahasiswa") {
            header('location:home_mahasiswa.php');
        } else if ($level == "Dosen") {
            header('location:home_dosen.php');
        } else if ($level == "Staff") {
            header('location:home_staff.php');
        }
    }else {
        echo "<script>window.alert('Login Gagal! Username atau Password Salah')</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300;url=index.php"/>
    <title>Arief_Login</title>

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
                        <a href="register.php" class="signup-image-link">Belum Punya Akun? Klik Disini</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" required="required" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" required="required" placeholder="Password"/>
                            </div>
                            <div class="dropdown">
                                <select class="form-control" name="level">
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Log in"/>
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