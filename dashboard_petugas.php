<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'petugas') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas</title>
    <link rel="stylesheet" href="dashboard_pimpinan.css">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: slategray;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .logout {
            margin-left: auto;
        }

        .logout a {
            color: white;
            text-decoration: none;
            padding: 10px;
            background: #dc3545;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .logout a:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.png" alt="Logo Toko">
            <h1>XIXIMART</h1>
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="sidebar">
            <a href="#">Dashboard</a>
            <a href="tampiltransaksi.php">Transaksi</a>
            <a href="barang.php">Produk</a>
            <a href="tampiljenis.php">Jenis produk</a>
        </div>
        <div class="content">
            <h2>Selamat datang,Petugas!</h2>
            <div class="card">
                <h3>Transaksi Hari Ini</h3>
                <p>Total transaksi hari ini: <strong>30</strong></p>
                <p>Total pendapatan: <strong>Rp 300.000</strong></p>
            </div>
            <div class="card">
                <h3>Riwayat Transaksi</h3>
                <p>Riwayat transaksi terbaru dapat dilihat di sini.</p>
            </div>
            <div class="card">
                <h3>Pengingat</h3>
                <p>Pastikan semua transaksi sudah diproses sebelum tutup hari.</p>
            </div>
        </div>
    </div>
</body>
</html>