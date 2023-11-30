<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $old_password = md5($_POST['password']);
    $konfir = md5($_POST['konfir']);
    $new_password = md5($_POST['new-password']);

    $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$old_password'";
    $filter = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($filter);

    if ($check > 0) {
        if ($old_password != $konfir) {
            $password_mismatch_error = "Password tidak sama";
        } else {
            // Update the password in the database
            $update_query = "UPDATE tbl_user SET password = '$new_password' WHERE username = '$username'";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                header('Location:profil_admin.php?pesan=password berhasil diubah');
            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        }
    } else {
        header('Location:profil_admin.php?pesan=eksis');
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>New Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            Width: 100%;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            background-image: url(asset/Background.png);
            color: white;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 50px;
            background-color: rgba(233, 26, 26, 0.1);
            position: relative;
        }


        h1,
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        button[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }

        label {
            color: white;
            display: block;
            margin-bottom: 10px;
        }

        label::after {
            content: "*";
            color: red;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        p a {
            color: #3498db;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        .footers {
            position: relative;
            display: flex;
            justify-content: space-between;
        }

        .footers img {
            width: 300px;
            /* Sesuaikan ukuran gambar */
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
            margin: 0 auto 1px;
            /* Membuat jarak antara gambar dan form */
            margin-bottom: -50px;
            width: 300px;
            /* Sesuaikan ukuran gambar */
            height: auto;
            position: relative;
            /* Ganti ke 'relative' agar bisa disusun di atas 'container' */
        }

        .fotosamping {
            display: block;
            margin: 0 auto 1px;
            /* Membuat jarak antara gambar dan form */
            margin-bottom: -100px;
            width: 700px;
            /* Sesuaikan ukuran gambar */
            height: auto;
            position: relative;
            /* Ganti ke 'relative' agar bisa disusun di atas 'container' */
        }
    </style>
</head>

<body>
    <img src="asset/register tulisan death note.png" alt="gambar atas" class="fotoatas">
    <img src="asset/Register kertas atas.png" alt="gambar samping" class="fotosamping">
    <div class="container">
        <h1>Selamat Datang!</h1>
        <p>Ayo mulai mencari target pembunuhan terbaru</p>
        <div class="ubah">
            <form name=" login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="login-form">
                <label for="name">Username</label>
                <input type="text" name="username" value="<?php echo $_SESSION['username'];?>" required>
                <label for="name">Nama Lengkap</label>
                <input type="text" name="fullname" value="<?php echo $_SESSION['fullname'];?>" required>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $_SESSION['email'];?>" required>
                <label for="password">Password lama</label>
                <input type="password" name="password" required>
                <label for="confirm-password">Konfirmasi Password lama</label>
                <input type="password" name="konfir" required>
                <label for="new-password">Buat Password Baru</label>
                <input type="password" name="new-password" required>
                <?php if (isset($password_mismatch_error)) { ?>
                    <span style="color: red;"><?php echo $password_mismatch_error; ?></span>
                <?php } ?>
                <button type="submit" name="submit">Ubah Password</button>
            </form>

        </div>
    </div>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>

    <div class="footers">
        <img src="asset/register gambar Shikigami.png" alt="gambar mc" class="kiri_bawah">
        <img src="asset/Register gambar Light.png" alt="gambar shinagami" class="kanan_bawah">
    </div>
</body>

</html>