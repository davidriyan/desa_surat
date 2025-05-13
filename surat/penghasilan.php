<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $pekerjaan = $_POST['pekerjaan'];
    $penghasilan = $_POST['penghasilan'];
    $tanggal = $_POST['tanggal'];

    $stmt = $conn->prepare("INSERT INTO surat_penghasilan (nama, nik, pekerjaan, penghasilan, tanggal) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama, $nik, $pekerjaan, $penghasilan, $tanggal);
    $stmt->execute();

    header("Location: ../generate_pdf.php?type=penghasilan&id=" . $conn->insert_id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Surat Penghasilan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-primary">Form Surat Penghasilan Orang Tua</h3>
        <form method="POST">
            <input class="form-control mb-2" name="nama" placeholder="Nama" required>
            <input class="form-control mb-2" name="nik" placeholder="NIK" required>
            <input class="form-control mb-2" name="pekerjaan" placeholder="Pekerjaan" required>
            <input class="form-control mb-2" name="penghasilan" placeholder="Penghasilan" required>
            <input class="form-control mb-2" type="date" name="tanggal" required>
            <button class="btn btn-primary">Buat Surat</button>
        </form>
    </div>
</body>

</html>