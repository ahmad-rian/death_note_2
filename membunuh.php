<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membunuh</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; /* Menambahkan box-sizing untuk menghindari masalah margin dan padding */
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            background-image: url(asset/Background.png);
            color: black;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .atas {
            display: block;
            margin: 0 auto 1px;
            margin-bottom: -50px;
            width: 300px;
            height: auto;
            position: relative;
        }

        .buku {
            position: absolute;
            top: 80px;
            right: 300px;
            width: 100px;
            height: auto;
            z-index: 1;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 50px;
            background-image: url(asset/homepage\ 1\ kertas\ .png);
            position: relative;
            z-index: 0;
        }

        form {
            display: grid;
            gap: 10px; /* Menambahkan jarak antara elemen-elemen form */
        }

        label {
            width: 100%; /* Menyesuaikan lebar label dengan lebar form */
            display: block;
            margin-bottom: 5px;
            color: #874b0f;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select[name="metode"] {
            width: 100%; /* Menyesuaikan lebar input dengan lebar form */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #874b0f;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: red;
        }

        footer {
            color: white;
            padding: 10px;
            overflow-x: hidden;
            text-align: center;
        }

        #news-carousel {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
        }

        .news-item {
            flex: 0 0 auto;
            width: 300px;
            background-color: #555;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 8px;
            margin-right: 10px;
            scroll-snap-align: start;
            transition: transform 0.3s ease;
        }

        .news-item:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <img src="asset/homepage 1 tulisan deathnote.png" class="atas">   
    <img src="asset/homepage 1 buku death note.png" alt="fotobuku" class="buku">
    <div class="container">
        <div>
            <form action="">
                <label for="name">Nama Mayat</label>
                <input type="text" name="username" required>
                <label for="name">Metode Kematian</label>
                <select id="metode" name="metode">
                    <option value="Pilih Metode Kematian"></option>
                    <option value="">Serangan Jantung</option>
                    <option value="">Tertabrak Mobil</option>
                    <option value="">Gantung Diri</option>
                    <option value="">Meminum Racun</option>
                    <option value="">Ditembak</option>
                    <option value="">Jatuh dari gedung</option>
                </select>
                <label for="date">Tanggal Kematian</label>
                <input type="date" name="date" required>
                <label for="waktu">Jam Kematian</label>
                <input type="time" name="waktu" value="Jam Kematian" required>
                <label for="catatan">Catatan</label>
                <input type="text" placeholder="Masukan Catatan Tambahan" name="catatan" required>
                <button type="submit" name="submit">Die Now!</button>
            </form>
        </div>
    </div>
    <footer>
    <h2>Berita Terkini</h2>
    <div id="news-carousel">
        <!-- Berita 1 -->
        <div class="news-item">
            <h3>Judul Berita 1</h3>
            <p>Deskripsi berita 1.</p>
        </div>

        <!-- Berita 2 -->
        <div class="news-item">
            <h3>Judul Berita 2</h3>
            <p>Deskripsi berita 2.</p>
        </div>

        <!-- Berita 3 -->
        <div class="news-item">
            <h3>Judul Berita 3</h3>
            <p>Deskripsi berita 3.</p>
        </div>
        <div class="news-item">
            <h3>Judul Berita 1</h3>
            <p>Deskripsi berita 1.</p>
        </div>

        <!-- Berita 2 -->
        <div class="news-item">
            <h3>Judul Berita 2</h3>
            <p>Deskripsi berita 2.</p>
        </div>

        <!-- Berita 3 -->
        <div class="news-item">
            <h3>Judul Berita 3</h3>
            <p>Deskripsi berita 3.</p>
        </div>


        <!-- Tambahkan lebih banyak berita sesuai kebutuhan -->
    </div>

    <script>
        const newsCarousel = document.getElementById('news-carousel');

        // Fungsi untuk membuat efek geser otomatis
        function autoScroll() {
            const scrollAmount = 300; // Ganti dengan lebar satu berita
            newsCarousel.scrollLeft += scrollAmount;
        }

        // Jalankan fungsi autoScroll setiap 3 detik
        setInterval(autoScroll, 3000);
    </script>
</footer>
</body>
</html>