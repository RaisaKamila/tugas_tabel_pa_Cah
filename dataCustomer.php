<?php
require_once 'barang.php';
require_once 'customerManager.php';

$customerManager = new CustomerManager();

// Menangani form tambah pelanggan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah_customer'])) {
    $nama = $_POST['nama_customer'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $customerManager->tambahCustomer($nama, $alamat, $telepon);
    header('Location: dataCustomer.php'); // Redirect untuk mencegah resubmission
}

// Menangani penghapusan pelanggan
if (isset($_GET['hapus_customer'])) {
    $id = $_GET['hapus_customer'];
    $customerManager->hapusCustomer($id);
    header('Location: dataCustomer.php'); // Redirect setelah menghapus
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Pelanggan</title>
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
        textarea {
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
        <h1>Pencatatan Pelanggan</h1>
        <form method="POST" action="">
            <div>
                <label for="nama_customer">Nama Pelanggan:</label><br>
                <input type="text" id="nama_customer" name="nama_customer" required>
            </div>
            <div>
                <label for="alamat">Alamat:</label><br>
                <textarea id="alamat" name="alamat" required></textarea>
            </div>
            <div>
                <label for="telepon">Telepon:</label><br>
                <input type="text" id="telepon" name="telepon" required>
            </div>
            <button type="submit" name="tambah_customer" class="btn btn-add">Tambah Pelanggan</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customerManager->getCustomers() as $customer): ?> 
                    <tr>
                        <td><?= $customer['id'] ?></td>
                        <td><?= $customer['nama'] ?></td>
                        <td><?= $customer['alamat'] ?></td>
                        <td><?= $customer['telepon'] ?></td>
                        <td>
                            <a href="?hapus_customer=<?= $customer['id'] ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
