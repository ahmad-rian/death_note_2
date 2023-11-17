<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Boxes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            padding: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }

        .info-container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .info-box {
            background-color: #eee;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <nav>
        <a href="#home">Beranda</a>
        <a href="#about">About</a>
        <a href="#profile">Profil</a>
    </nav>

    <div class="info-container">
        <div class="info-box">
            <h2>Box 1</h2>
            <p>Informasi mengenai Box 1.</p>
        </div>
        <div class="info-box">
            <h2>Box 2</h2>
            <p>Informasi mengenai Box 2.</p>
        </div>
        <div class="info-box">
            <h2>Box 3</h2>
            <p>Informasi mengenai Box 3.</p>
        </div>
        
    </div>

    <div class="info-container">
        <div class="info-box">
            <h2>Box 1</h2>
            <p>Informasi mengenai Box 1.</p>
        </div>
        <div class="info-box">
            <h2>Box 2</h2>
            <p>Informasi mengenai Box 2.</p>
        </div>
        <div class="info-box">
            <h2>Box 3</h2>
            <p>Informasi mengenai Box 3.</p>
        </div>
        
    </div>  

</body>
</html>
