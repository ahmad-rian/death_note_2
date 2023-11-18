<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $konfir = md5($_POST['konfir']);

    $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['level'] == "Administrator") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "Administrator";
            header('Location:index.php');
        } elseif ($data['level'] == "Guest") {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "Guest";
            header('Location:index.php');
        } else {
            if ($password != $konfir) {
                $password_mismatch_error = "Username atau Password salah";
                
            }
        }
    } else {
        if ($password != $konfir) {
            $password_mismatch_error = "Username atau Password salah";
            
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
         *{
        margin:0;
        padding: 0;
        Width: 100%;
        }    
    body {
        font-family: 'Times New Roman', Times, serif;
        background-color: #f4f4f4;
        background-image: url(Background.png);
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

    
    h1, h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    
    form {
        display: flex;
        flex-direction: column;
    }
    
    input[type="text"], input[type="email"], input[type="password"] {
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
    
    p {
        text-align: center;
        margin-top: 20px;
    }
    
    p a {
        color: white;
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
            width: 150px; /* Sesuaikan ukuran gambar */
            height: auto;
            position: absolute;
            bottom: -80px;
            
           
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
            width: 100px; /* Sesuaikan ukuran gambar */
            height: auto;
            position: relative; /* Ganti ke 'relative' agar bisa disusun di atas 'container' */
        }
        .pakukanan {
    position: absolute;
    top: 40px; /* Adjust the distance from the top as needed */
    right: 280px; /* Adjust the distance from the right as needed */
    width: 100px;
    height: auto;
}

    .pakukiri {
        position: absolute;
        top: 30px; /* Adjust the distance from the top as needed */
        left: 280px; /* Adjust the distance from the left as needed */
        width: 100px;
        height: auto;
}
</style>
</head>

<body>
    <img src="register tulisan death note.png" alt="gambar atas" class="fotoatas">
    <img src="Login paku kanan.png" alt="gambar samping" class="pakukanan">
    <img src="Login paku kiri.png" alt="kiri" class="pakukiri">
    <div class="container">
    <h1>Selamat Datang!</h1>
        <p>Ayo mulai mencari target pembunuhan terbaru</p>
    <div class="register">
        <form name="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="login-form">
            <label for="username">Username</label>  
            <input type="text" name="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <?php if (isset($password_mismatch_error)) { ?>
                <span style="color: red;"><?php echo $password_mismatch_error; ?></span>
            <?php } ?>
            <button type="submit" name="submit">Login</button>
            <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
        </form>
     </div>
    <div class="alternative">
        <p>Belum punya akun? <a href="register.php"><b>Click Here!</b></a></p>
    </div>
    </div>
        
    <div class="footers">
            <img src="login L berdiri.png" alt="gambar mc" class="kiri_bawah">
            <img src="login L duduk.png" alt="gambar shinagami" class="kanan_bawah">
    </div>
</body>

</html>