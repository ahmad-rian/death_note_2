<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $konfir = md5($_POST['konfir']);

    $sql = "SELECT * FROM tbl_user WHERE username = '$username' OR email = '$email'";
    $filter = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($filter);
    if ($check > 0) {
        header('Location:register.php?pesan=eksis');
    } else {
        if ($password != $konfir) {
            $password_mismatch_error = "Password tidak sama";
        } else {
            $query = "INSERT INTO tbl_user(fullname, username, email, password, level) VALUES ('$fullname', '$username', '$email', '$password', 'Guest')";
            $result = mysqli_query($conn, $query);
            header('Location:login.php?pesan=berhasil');
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url('bg.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        form {
            max-width: 400px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        span {
            display: block;
            margin-bottom: 10px;
            color :white;
        }

        span::after{
            content:"*";
            color :red;
        }

        .required-field {
            color: red;
        }

        form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #666;
            border-radius: 4px;
            background-color: #444;
            color: #fff;
            box-sizing: border-box;
        }

        .footers img {
            width: 300px; /* Sesuaikan ukuran gambar */
            height: auto;
            position: absolute;
            bottom: 0;
            
           
        }

        .kiri_bawah {
            left: 10;
            
        }

        .kanan_bawah {
            right: 0;
           
        }
        .fotoatas {
            display: block;
            margin: 0 auto 1px; /* Membuat jarak antara gambar dan form */
            margin-bottom: -50px;
            width: 300px; /* Sesuaikan ukuran gambar */
            height: auto;
            position: relative; /* Ganti ke 'relative' agar bisa disusun di atas 'container' */
        }
        .fotosamping{
            display: block;
            margin: 0 auto 1px; /* Membuat jarak antara gambar dan form */
            margin-bottom: -100px;
            width: 700px; /* Sesuaikan ukuran gambar */
            height: auto;
            position: relative; /* Ganti ke 'relative' agar bisa disusun di atas 'container' */
        }
</style>
</head>

<body>
    <img src="register tulisan death note.png" alt="gambar atas" class="fotoatas">
    <img src="Register kertas atas.png" alt="gambar samping" class="fotosamping">
    <div class="container">
    <h1>Selamat Datang!</h1>
        <p>Ayo mulai mencari target pembunuhan terbaru</p>
    <div class="register>
        <form name="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="login-form">
            <label for="name">Username</label>  
            <input type="text" name="fullname" required>
            <label for="name">Nama Lengkap</label>
            <input type="text" name="username" required>
            <label for="email">Email</label>
            <input type="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <label for="confirm-password">Konfirmasi Password</label>
            <input type="password" name="konfir" required>
            <?php if (isset($password_mismatch_error)) { ?>
                <span style="color: red;"><?php echo $password_mismatch_error; ?></span>
            <?php } ?>
            <button type="submit">Daftar</button>
        </form>
     </div>
    <div class="alternative">
        <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
    </div>
    </div>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>

    <div class="footers">
            <img src="register gambar Shikigami.png" alt="gambar mc" class="kiri_bawah">
            <img src="Register gambar Light.png" alt="gambar shinagami" class="kanan_bawah">
    </div>
</body>

</html>