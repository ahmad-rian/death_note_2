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

        form input[type="submit"] {
            background-color: #2196F3;
            color: #fff;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #1565C0;
        }

        a {
            color: #64b5f6;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .fa {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <form name="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="login-form">
        <span>Username</span>
        <input type="text" name="fullname" required>
        <span>Nama Lengkap</span>
        <input type="text" name="username" required>
        <span>Email</span>
        <input type="email" name="email" required>
        <span>Password</span>
        <input type="password" name="password" required>
        <span>Konfirmasi Password</span>
        <input type="password" name="konfir" required>
        <?php if (isset($password_mismatch_error)) { ?>
            <span style="color: red;"><?php echo $password_mismatch_error; ?></span>
        <?php } ?>
        <span>Already have an account? <a href="login.php">Click here</a></span>
        <br><input type="submit" name="submit">
    </form>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>

</html>