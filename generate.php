<?php
require 'vendor/autoload.php';
require 'includes/db.php';

use Dompdf\Dompdf;

$type = $_GET['type'] ?? '';
$id = $_GET['id'] ?? '';

$dompdf = new Dompdf();

$html = '';

switch ($type) {
    case 'penghasilan':
        $query = $conn->query("SELECT * FROM surat_penghasilan WHERE id = $id");
        $data = $query->fetch_assoc();

        $html = "
        <h2 style='text-align: center;'>Surat Keterangan Penghasilan Orang Tua</h2>
        <p>Yang bertanda tangan di bawah ini:</p>
        <p>Nama: {$data['nama']}</p>
        <p>NIK: {$data['nik']}</p>
        <p>Pekerjaan: {$data['pekerjaan']}</p>
        <p>Dengan ini menyatakan bahwa penghasilan per bulan adalah: Rp {$data['penghasilan']}</p>
        <br>
        <p>Demikian surat ini dibuat untuk keperluan yang bersangkutan.</p>
        <p style='text-align: right;'>Tanggal: {$data['tanggal']}</p>
        ";
        break;

    case 'domisili':
        $query = $conn->query("SELECT * FROM surat_domisili WHERE id = $id");
        $data = $query->fetch_assoc();

        $html = "
        <h2 style='text-align: center;'>Surat Keterangan Domisili</h2>
        <p>Nama: {$data['nama']}</p>
        <p>NIK: {$data['nik']}</p>
        <p>Alamat: {$data['alamat']}</p>
        <br>
        <p>Adalah benar warga yang berdomisili di desa kami.</p>
        <p>Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.</p>
        <p style='text-align: right;'>Tanggal: {$data['tanggal']}</p>
        ";
        break;

    case 'akte':
        $query = $conn->query("SELECT * FROM surat_akte WHERE id = $id");
        $data = $query->fetch_assoc();

        $html = "
        <h2 style='text-align: center;'>Surat Keterangan Akte Kelahiran</h2>
        <p>Nama Anak: {$data['nama_anak']}</p>
        <p>Tanggal Lahir: {$data['tanggal_lahir']}</p>
        <p>Nama Ayah: {$data['nama_ayah']}</p>
        <p>Nama Ibu: {$data['nama_ibu']}</p>
        <p>Alamat: {$data['alamat']}</p>
        <br>
        <p>Demikian surat ini dibuat sebagai keterangan resmi dari desa.</p>
        <p style='text-align: right;'>Tanggal: {$data['tanggal']}</p>
        ";
        break;

    default:
        echo "Jenis surat tidak valid.";
        exit;
}

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("surat-$type-$id.pdf", array("Attachment" => false));
