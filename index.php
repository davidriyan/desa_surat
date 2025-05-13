<?php
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Desa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Selamat datang di Sistem Pembuatan Surat Desa</h1>
            <p>Silakan login untuk melanjutkan.</p>
        </div>

        <form action="login.php" method="post">
            <h2>Login</h2>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <footer>
            <p>&copy; 2025 Surat Desa - Semua hak dilindungi.</p>
        </footer>
    </div>

</body>

</html>