<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];

    $stmt = $conn->prepare("INSERT INTO surat_domisili (nama, nik, alamat, tanggal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $nik, $alamat, $tanggal);
    $stmt->execute();

    header("Location: ../generate_pdf.php?type=domisili&id=" . $conn->insert_id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Surat Domisili</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-primary">Form Surat Domisili</h3>
        <form method="POST">
            <input class="form-control mb-2" name="nama" placeholder="Nama" required>
            <input class="form-control mb-2" name="nik" placeholder="NIK" required>
            <textarea class="form-control mb-2" name="alamat" placeholder="Alamat" required></textarea>
            <input class="form-control mb-2" type="date" name="tanggal" required>
            <button class="btn btn-primary">Buat Surat</button>
        </form>
    </div>
</body>

</html>