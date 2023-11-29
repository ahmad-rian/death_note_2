<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
      margin: 0px;
      padding: 0px;
    }

    body {
      width: 100%;
      height: 100%;
      background-image: url(asset/Background.png);
      background-size: cover;
      background-repeat: no-repeat;
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

    .nonton {
      padding-top: 50px;
      display: flex;
      height: 100%;
      width: 100%;
      justify-content: center;
      align-items: center;
      color: #f0f8ff;
      font-size: 50px;

    }

    .nonton {
      margin: 60px auto 0;
      background-image: url(asset/p.png);
      height: 300px;
      width: 670px;
      background-size: cover;
      background-repeat: no-repeat;
      border: 10px solid rgb(99, 96, 96);


    }

    #p {
      color: rgb(255, 255, 255) !important;
      opacity: 1 !important;
      z-index: 1;
      width: 300px;
      text-align: center;
      line-height: 60px;
      margin-top: -70px;

    }

    button[type="submit"] {
      width: 200px;
      margin-top: 40px;
      padding: 8px;
      background-color: red;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
      margin-left: 50px;
    }

    button[type="submit"]:hover {
      background-color: #2980b9;
    }

    .carousel {
      font-size: 12px;
      display: flex;
      overflow: hidden;
      width: 100%;
      height: 100%;
      align-items: center;
      justify-content: center;
      margin-top: 50px;
      /* Ubah margin-top sesuai kebutuhan */
    }

    .slide {
      display: none;
      width: 100%;
      height: 100%;
      text-align: center;
      /* Pusatkan teks dalam slide */
    }

    .slide img {
      width: 50%;
      height: 50%;
      object-fit: cover;
      border-radius: 8px;
      /* Tambahkan efek border-radius jika diinginkan */
    }

    .slide.active {
      display: block;
    }

    .chapter {
      color: white;
      text-align: center;
      /* Pusatkan teks pada div chapter */
      margin-top: 20px;
      /* Sesuaikan margin-top agar rapih */
    }

    .bawah {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 100px;
      /* Adjust margin-top as needed */
      padding: 0 20px;
      /* Add padding for better spacing */
    }

    .kiri {
      flex: 1;
      /* Add styles if content is to be placed in the left section */
    }

    .kanan {
      flex: 1;
      text-align: right;
      /* Align content to the right within the section */
      margin-right: -50px;
    }

    .kanan img {
      width: 100%;
      /* Adjust width if needed */
      max-width: 400px;
      /* Limit the maximum width of the image */
      height: auto;
      /* Maintain aspect ratio */
      display: block;
      border-radius: 8px;
      /* Add border-radius for image if desired */
    }

    .kiri {
      flex: 1;
      /* Add styles if content is to be placed in the left section */
      display: flex;
      flex-direction: column;
      /* Arrange items in a column */
      justify-content: left;
      /* Center content vertically */
      align-items: flex-end;
      /* Align content to the right within the section */
      margin-left: 100px;
    }

    .kiri h3,
    .kiri p {
      margin-right: 300px;
      /* Adjust margin as needed between text and image */
      color: #fff;
      /* Text color */
    }

    .kiri p {
      font-size: 13px;
      /* Font size for the text */
    }
  </style>
</head>

<body>
  <div class="header">
    <div><a href="beranda.php">Beranda</a></div>
    <div><a href="merchaindes.php">Merchandise</a></div>
    <div><a href="profil_user.php">Profil</a></div>
  </div>

  <div class="nonton">
    <div>
      <p id="p"><strong>Death Note Live Action</strong></p>
      <button type="submit"><a href="https://www.bilibili.tv/id/video/2006674042">Nonton</a></button>
    </div>
  </div>

  <div class="chapter">
    <h3>New Chapter</h3>

    <div class="carousel">
      <div class="slide active">
        <img src="asset/103.jpeg" alt="Image 1" width="50px" height="20px">
        <p>Hitungan detik mulai diucapkan apakah yang akan terjadi </p>
        <button style="background-color: #FF0000;"><a href="https://mangaku.team/death-note-chapter-103/">Baca</a></button>
      </div>
      <div class="slide active">
        <img src="asset/104.jpeg" alt="Image 2" width="50px" height="20px">
        <p>Tertawanya sang Kira,apa yang terjadi disini!</p>
        <button style="background-color: #FF0000;"> <a href="https://mangaku.team/death-note-chapter-104">Baca</a> </button>
      </div>
      <div class="slide">
        <img src="asset/105.jpeg" alt="Image 3" height="50px" width="20px">
        <p>Pengakuan Diri sang Pembunuh Berantai</p>
        <button style="background-color: #FF0000;"> <a href="https://mangaku.team/death-note-chapter-105">Baca</a> </button>
      </div>
      <div class="slide">
        <img src="asset/106.jpeg" alt="Image 3" height="20px" width="20px">
        <p>Tembakan mulai dikeluarkan mengarah langsung ke sang pembunuh</p>
        <button style="background-color: #FF0000;"> <a href="https://mangaku.team/death-note-chapter-106">Baca</a> </button>
      </div>



      <!-- Left and right controls/icons -->
      <script>
        let currentIndex = 0;

        function changeSlide() {
          const slides = document.querySelectorAll('.slide');

          for (let i = 0; i < slides.length; i++) {
            slides[i].classList.remove('active');
          }

          for (let i = currentIndex; i < currentIndex + 2; i++) {
            slides[i].classList.add('active');
          }

          currentIndex += 2;

          if (currentIndex >= slides.length) {
            currentIndex = 0;
          }
        }

        setInterval(changeSlide, 5000); // Ganti slide setiap 5 detik
      </script>
    </div>
  </div>
  <div class="bawah">
    <div class="kiri">
      <h3>Perbandingan Ukuran Shinikagami di
        Dunia Nyata,Setinggi 4 Meter!</h3>
      <p>Terdapat shinigami-shinigami di dunia death note.Mulai dari shikigami kira dan lain-lain.
        Shikigami ini memiliki tinggi rata-rata 3-6 meter dengan berbagai macam kekuatan</p>
    </div>
    <div class="kanan">
      <img src="asset/shinikagami.jpeg" alt="" width="500px" height="500px">
    </div>
  </div>

  <div class="footer">
    <h3>Berita Terbaru</h3>
    <div class="carousel">

    </div>
  </div>
</body>

</html>