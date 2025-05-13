<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Surat Desa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Dashboard Admin</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 d-grid gap-3">
                <a href="surat/penghasilan.php" class="btn btn-primary btn-lg">Buat Surat Penghasilan Orang Tua</a>
                <a href="surat/domisili.php" class="btn btn-primary btn-lg">Buat Surat Domisili</a>
                <a href="surat/akte.php" class="btn btn-primary btn-lg">Buat Surat Akte Kelahiran</a>
                <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>