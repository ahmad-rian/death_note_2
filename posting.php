<?php
session_start();
include("connection.php");

// Ambil id_user dari sesi pengguna yang sudah login
$id_user = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $judul = $_POST["judul"];
    $sumber = $_POST["sumber"];
    $deskripsi = $_POST["deskripsi"];
    $gambar = $_FILES["gambar"]["name"]; 
    $gambar_temp = $_FILES["gambar"]["tmp_name"];

    // Proses file gambar
    $gambar_path = "img_berita/" . $gambar;
    move_uploaded_file($gambar_temp, $gambar_path);

    // Simpan data berita ke database dengan prepared statement
    $sql = "INSERT INTO tbl_berita (judul, sumber_berita, isi_berita, timestmp, id, gambar) VALUES (?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $judul, $sumber, $deskripsi, $id_user, $gambar);

    if ($stmt->execute()) {
        echo "<script>alert('Berhasil Menambahkan berita');window.location.href = 'berita_jurnal.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background-image: url(asset/Background.png);
            background-size: cover;
            background-repeat: no-repeat;
            color: white;
        }

        .container {
            width: 80%;
            max-width: 600px;
            padding: 0 20px; /* Penambahan padding agar responsif */
        }

        h1 {
            margin-top: 30px;
            text-align: center;
            margin-bottom: 30px; /* Mengurangi margin bottom */
        }

        h3 {
            margin-bottom: 20px;
        }

        label {
            margin-top: 10px;
            display: block;
            margin-bottom: 10px;
        }

        textarea,
        input[type="text"],
        input[type="file"] {
            color: white;
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            font-size: 16px;
            background-color: rgba(231, 219, 219, 0.5);
            box-sizing: border-box; /* Penambahan box-sizing */
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }

        /* Responsif */
        @media screen and (max-width: 768px) {
            .container {
                width: 90%; /* Lebar kontainer diubah untuk layar kecil */
            }

            input[type="text"],
            input[type="file"],
            textarea {
                font-size: 14px; /* Ukuran teks diubah untuk layar kecil */
            }
        }
    </style>
</head>
<body>
    <h1>Tambahkan Berita Baru</h1>
    <div class="container">
        <form action="">
            <h3>Detail Berita</h3>
            <label for="judul_berita">Judul Berita</label>
            <input type="text" value="Masukan Judul.....">
            <label for="Sumber_berita">Sumber Berita</label>
            <input type="text" value="Masukan Sumber.....">
            <label for="berita">Berita</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            <label for="gambar_sampul_berita">Gambar Sampul Berita</label>
            <input type="file" value="Choose file">
        </form>
    </div>
    <input type="submit" value="Tambahkan">
</body>
</html>