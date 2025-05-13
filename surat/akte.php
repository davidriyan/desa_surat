<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_anak = $_POST['nama_anak'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];

    $stmt = $conn->prepare("INSERT INTO surat_akte (nama_anak, tanggal_lahir, nama_ayah, nama_ibu, alamat, tanggal) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama_anak, $tanggal_lahir, $nama_ayah, $nama_ibu, $alamat, $tanggal);
    $stmt->execute();

    header("Location: ../generate_pdf.php?type=akte&id=" . $conn->insert_id);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Surat Akte Kelahiran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-primary">Form Surat Akte Kelahiran</h3>
        <form method="POST">
            <input class="form-control mb-2" name="nama_anak" placeholder="Nama Anak" required>
            <input class="form-control mb-2" type="date" name="tanggal_lahir" required>
            <input class="form-control mb-2" name="nama_ayah" placeholder="Nama Ayah" required>
            <input class="form-control mb-2" name="nama_ibu" placeholder="Nama Ibu" required>
            <textarea class="form-control mb-2" name="alamat" placeholder="Alamat" required></textarea>
            <input class="form-control mb-2" type="date" name="tanggal" required>
            <button class="btn btn-primary">Buat Surat</button>
        </form>
    </div>
</body>

</html>