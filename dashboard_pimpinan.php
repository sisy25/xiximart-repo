<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'pimpinan') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard pimpinan</title>
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

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #3498db;
            transition: color 0.3s;
        }

        a:hover {
            color: #2980b9;
        }

        button, .btn {
            padding: 10px 15px;
            color: white;
            background-color: #2c3e50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover, .btn:hover {
            background-color: #1abc9c;
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
            <a href="dashboard_pimpinan.php">Dashboard</a>
        </div>
        <div class="content">
            <h2>Selamat datang, Pimpinan!</h2>
            <div>
                <?php
                // Check if user is logged in
                if (!isset($_SESSION['username'])) {
                    header("Location: login.php");
                    exit();
                }

                // Include database connection
                include 'koneksi.php';

                // Query to fetch data from user table
                $query = "SELECT * FROM user";
                $result = mysqli_query($conn, $query);
                ?>
                
                <div class="content">
                    <h1>Data User</h1>
                    <table>
                        <tr>
                            <th>ID User</th>
                            <th>Username</th>
                            <th>Nama User</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_user'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['nama_user'] . "</td>";
                            echo "<td>" . $row['level'] . "</td>";
                            echo "<td>
                                    <a href='frmupdateuser.php?id=" . $row['id_user'] . "'>Update</a> |
                                    <a href='frmdeleteuser.php?id=" . $row['id_user'] . "'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                    <br>
                    <a href="frminsertuser.php