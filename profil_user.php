<?php
// Include your database connection file
include "connection.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Fetch user data
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($query);

if($query){
    if(isset($_FILES["fileImg"]["name"])){
        $uploaddir = "profile_picture/";
        $uploadname = $_FILES['fileImg']['name'];
        $uploadtmp = $_FILES['fileImg']['tmp_name'];
        $nameuploaded = $username . "_" . $uploadname;

        if(file_exists($uploaddir . $user['image'])){
            unlink($uploaddir . $user['image']);
            move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
        }else{
            move_uploaded_file($uploadtmp, $uploaddir . $nameuploaded);
        }

        $sql = "UPDATE tbl_user SET image = '$nameuploaded' WHERE username = '$username'";
        $query = mysqli_query($conn, $sql);
        if($query){
            echo "<script>alert('Successfull change profile!');window.location.href = 'profil_user.php';</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
    <style >
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0px;
            padding: 0px;
        }

        body {
            background-image: url(asset/Background.png);
            background-size: cover;
            background-repeat: no-repeat;
            color: white;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: -webkit-sticky;
            /* Safari */
            position: sticky;
            top: 0;

        }

        div {
            justify-content: center;
            align-items: center;

        }

        div a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        div a:hover {
            background-color: #D7C3A2;
            color: #FF0000;

        }

        .atas {
            padding-top: 0px;
            display: flex;
            height: 100%;
            width: 100%;
            justify-content: center;
            align-items: center;
            color: #f0f8ff;
            font-size: 50px;

        }

        .atas {
            margin-left: 40px;
            margin: 0px auto 0;
            background-image: url(asset/profil.jpeg);
            height: 350px;
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;


        }

        .tengah {
            display: flex;
            flex-direction: column;
        }

        .foto_profil {
            border-radius: 100%;
            border: solid 5px white;
        }

        .kamera {
            margin-top: -25px;
            margin-left: 70px;
            border-radius: 100%;
            border: solid 5px white;
        }

        .awokawok {
            align-items: center;
            display: flex;
            max-width: 100%;
            width: 100%;
        }

        .kiri {
            display: flex;
            justify-content: space-between;
            /* Menyisipkan ruang di antara elemen-elemen di dalamnya */
            width: 60%;
            /* Lebar div "kiri" */
            margin: 0 auto;
            /* Pusatkan div "kiri" */
        }

        .kiri>div {
            flex: 1;
            /* Memiliki proporsi yang sama */
        }

        .kiri>div:first-child {
            flex: 1;
            /* Menambahkan ruang antara elemen pertama dan kedua */
        }

        h2 {
            margin-top: 60px;
            margin-left: 330px;
        }

        .kiri {
            margin-top: 30px;
            flex: 1;
            align-items: center;

            width: 50%;
            margin-left: 300px;
            padding: 30px;
        }

        .kiri label [type="username"] {
            margin-left: -90px;
        }

        .kanan {
            flex: 1;
            align-items: center;
            margin-top: -140px;
            width: 50%;
            padding: 30px;
        }

        .kanan>div:first-child {
            flex: 1;
            margin-right: 20px;
            /* Menambahkan ruang antara elemen pertama dan kedua */
        }

        .kanan input[type="submit"] {
            position: absolute;
            bottom: -100px;
            right: 320px;

        }

        input[type="submit"] {
            width: 168px;
            height: 30px;
            margin-top: 10px;
            padding: 8px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 0px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        input[type="text"],
        input[type="email"] {
            margin-bottom: 10px;
            padding: 3px;
            border: 1px solid #ddd;
            border-radius: 3px;
            background-color: rgba(255, 255, 255, 0.30);
        }

        .button-logout {
            width: 168px;
            height: 30px;
            margin-top: 10px;
            padding: 8px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 0px;
        }
        .upload{
      width: 140px;
      position: relative;
      margin: auto;
      text-align: center;
    }
    .upload img{
      border-radius: 50%;
      border: 8px solid #DCDCDC;
      width: 125px;
      height: 125px;
    }
    .upload .rightRound1{
      position: absolute;
      bottom: 0;
      right: 0;
      background: white;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
      background-image: url(asset/camera-appicon.jpeg);
      background-size: cover;
    }
    .upload .rightRound{
      position: absolute;
      bottom: 0;
      right: 0;
      background: white;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
      background-image: url(asset/ceklis-icon.jpeg);
      background-size: cover;
    }
    .upload .leftRound{
      position: absolute;
      bottom: 0;
      left: 0;
      background: red;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      border-radius: 50%;
      overflow: hidden;
      cursor: pointer;
      background-image: url(asset/cancel-icon.jpeg);
      background-size: cover;
    }
    
    .upload .fa{
      color: white;
    }
    .upload input{
      position: absolute;
      transform: scale(2);
      opacity: 0;
    }
    .upload input::-webkit-file-upload-button, .upload input[type=submit]{
      cursor: pointer;
    }
    </style>
</head>

<body>
    <div class="header">
        <div><a href="beranda_user.php">Beranda</a></div>
        <div><a href="merchandise.php">Merchandise</a></div>
        <div><a href="profil_user.php">Profil</a></div>
    </div>

    <div class="atas">
        <!-- Your profile information and image display -->
        <div class="tengah">
            <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                <div class="upload">
                    <img src="profile_picture/<?php echo $user['image']; ?>" id = "image">

                    <div class="rightRound1" id="upload">
                        <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                    </div>

                    <div class="leftRound" id="cancel" style="display: none;">
                        
                    </div>
                    <div class="rightRound" id="confirm" style="display: none;">
                        <input type="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <h2 style="margin-bottom: -60px;">Personal Information</h2>
    <div class="awokawok">

        <div class="kiri">

            <table>
                <form action="ubah_password.php" name="user-profile" method="POST">
                    <tr>
                        <td><label for="username">Username</label> <br>
                            <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" required readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="namalengkap">Nama Lengkap</label> <br>
                            <input type="text" name="namalengkap" value="<?php echo $_SESSION['fullname']; ?>" required readonly>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Settings</strong> <br>
                            <input type="submit" name="ubah_password" value="Ubah Password">
                        </td>
                    </tr>
                </form>

            </table>

        </div>

        <div class="kanan">
            <table>
                <tr>
                    <td><label for="email">Email</label> <br>
                        <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required readonly>
                    </td>
                </tr>
                <tr>
                    <td><a href="logout.php" class="button-logout">Logout</a></td>
                </tr>
            </table>
        </div>
    </div>
    <script type="text/javascript">
      document.getElementById("fileImg").onchange = function(){
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
      }

      var userImage = document.getElementById('image').src;
      document.getElementById("cancel").onclick = function(){
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
      }
    </script>

</body>

</html>