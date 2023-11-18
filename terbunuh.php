<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membunuh</title>
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
        color: black;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
        .atas {
            display: block;
            margin: 0 auto 1px; /* Membuat jarak antara gambar dan form */
            margin-bottom: -50px;
            width: 300px; /* Sesuaikan ukuran gambar */
            height: auto;
            position: relative; /* Ganti ke 'relative' agar bisa disusun di atas 'container' */
        }
        .buku {
    position: absolute;
    top: 80px; /* Adjust the distance from the top as needed */
    right: 300px; /* Adjust the distance from the right as needed */
    width: 100px;
    height: auto;
    z-index: 1;
}
.container {
            max-width: 500px;
            margin: 50px auto;
            padding: 50px;
            position: relative;
            z-index: 0;
            
        }
        form {
        flex-direction: column;
        display: grid;
        place-items: center;
    }
    
    input[type="text"], input[type="date"], input[type="time"], select[name="metode"] {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    button[type="submit"] {
        margin-top: 20px;
        width: 100px;
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
    body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
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
    
    </style>
</head>
<body>
    <img src="homepage 1 tulisan deathnote.png" class="atas">   
    <img src="homepage 1 buku death note.png" alt="fotobuku" class="buku">
    <div class="container">
        <div>
            <video id="bgVideo" autoplay controls>
            <source src="bgVideo.mp4" type="video/mp4">
            </video>
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