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
    <title></title>
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
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        form {
            max-width: 400px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        form span {
            display: block;
            margin-bottom: 10px;
            color: #bbdefb;
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

        /* Death Note Theme Styles */
        form {
            position: relative;
        }
    </style>
</head>

<body>
    <form name="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="login-form">
        <span>Username</span>
        <input type="text" name="username" required>
        <span>Password</span>
        <input type="password" name="password" required>
        <?php if (isset($password_mismatch_error)) { ?>
            <span style="color: red;"><?php echo $password_mismatch_error; ?></span>
        <?php } ?>
        <span>Don't have an account? <a href="register.php">Click here</a></span>
        <br><input type="submit" name="submit">
    </form>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>

</html>