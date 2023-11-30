<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
    <style>
        /* Your existing styles remain unchanged */

        /* Add some additional styles for displaying news */
        .news-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .news-card {
            width: 300px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            background-color: #f0f8ff;
        }

        .news-card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="header">
        <!-- Your header content remains unchanged -->
    </div>

    <div class="news-container">
        <?php
        session_start();
        include("connection.php");

        // Define base URL for images
        $base_url = "img_berita/";

        // Retrieve news data from the database
        $sql = "SELECT * FROM tbl_berita ORDER BY timestmp DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display each news as a card
                echo '<div class="news-card">';
                echo '<a href="' . $row['sumber_berita'] . '"><h2>' . $row['judul'] . '</h2></a>';
                echo '<p>' . $row['isi_berita'] . '</p>';

                // Check if the image exists before displaying it
                $image_path = $base_url . $row['gambar'];
                if (file_exists($image_path)) {
                    echo '<img src="' . $image_path . '" alt="Gambar Berita">';
                } else {
                    echo '<p>Image not found</p>';
                }

                echo '<p>Tanggal: ' . $row['timestmp'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Tidak ada berita yang tersedia.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    
</body>

</html>
