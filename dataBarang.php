<?php
require_once 'Barang.php';
require_once 'BarangManager.php';

$barangManager = new BarangManager();

// Menangani form tambah barang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $barangManager->tambahBarang($nama, $harga, $stok);
    header('Location: dataBarang.php'); // Redirect untuk mencegah resubmission
}

// Menangani penghapusan barang
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barangManager->hapusBarang($id);
    header('Location: dataBarang.php'); // Redirect setelah menghapus
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Barang</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
        position: relative; /* Dibutuhkan agar posisi absolute bisa bekerja dalam konteks body */
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        color: #4CAF50;
    }

    form {
        margin-bottom: 20px;
    }

    form div {
        margin-bottom: 10px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table th {
        background-color: #4CAF50;
        color: white;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        text-decoration: none;
        padding: 8px 12px;
        color: white;
        border-radius: 4px;
    }

    .btn.btn-add {
        background-color: #4CAF50;
    }

    .btn.btn-delete {
        background-color: #f44336;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .btn-home {
            position: absolute;
            top: 10px;  
            left: 10px;
            background-color: #007bff;
            padding: 12px 25px;
            font-size: 16px;
            text-align: center;
            border-radius: 5px;
        }

        .btn-home:hover {
            background-color: #0056b3;
        }

        .btn-home {
            position: absolute;
            top: 10px;  
            left: 10px;
            background-color: #4CAF50; 
            padding: 12px 25px;
            font-size: 16px;
            text-align: center;
            border-radius: 5px;
        }

        .btn-home:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <a href="index.php" class="btn btn-home">Kembali ke Home</a> <!-- Tombol Kembali ke Home -->

    <div class="container">
        <h1>Pencatatan Barang</h1>
        <form method="POST" action="">
            <div>
                <label for="nama">Nama Barang:</label><br>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div>
                <label for="harga">Harga Barang:</label><br>
                <input type="number" id="harga" name="harga" required>
            </div>
            <div>
                <label for="stok">Stok Barang:</label><br>
                <input type="number" id="stok" name="stok" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-add">Tambah Barang</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barangManager->getBarang() as $barang): ?> 
                    <tr>
                        <td><?= $barang['id'] ?></td>
                        <td><?= $barang['nama'] ?></td>
                        <td><?= $barang['harga'] ?></td>
                        <td><?= $barang['stok'] ?></td>
                        <td>
                            <a href="?hapus=<?= $barang['id'] ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
