<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Pencatatan</title>
    <style>
        /* Mengatur body untuk memposisikan elemen di tengah */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            height: 100vh; /* Mengatur tinggi layar penuh */
            display: flex;
            justify-content: center; /* Mengatur posisi horizontal di tengah */
            align-items: center; /* Mengatur posisi vertikal di tengah */
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px; /* Maksimal lebar kontainer */
        }

        h1 {
            font-size: 2.5rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        p {
            color: #777;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: inline-block;
            margin: 15px;
            padding: 15px 30px;
            text-decoration: none;
            color: #ffffff;
            background-color: #4CAF50;
            border-radius: 5px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .menu a:hover {
            background-color: #45a049;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .menu a:active {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Sistem Pencatatan</h1>
        <div class="menu">
            <a href="databarang.php">Data Barang</a>
            <a href="datacustomer.php">Data Custumer</a>
        </div>
    </div>
</body>
</html>
