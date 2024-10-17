<?php
$koneksi_kunjungan = new mysqli('localhost', 'root', '', 'sintya_xipplg2');

if ($koneksi_kunjungan->connect_error) {
    die("Connection failed: " . $koneksi_kunjungan->connect_error);
}

if (isset($_POST['simpan'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    // Check if the record already exists to determine whether to insert or update
    $stmt = $koneksi_kunjungan->prepare("SELECT * FROM kunjungan WHERE idKunjungan = ?");
    $stmt->bind_param("s", $idKunjungan);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing record
        $stmt = $koneksi_kunjungan->prepare("UPDATE kunjungan SET idPasien = ?, idDokter = ?, tanggal = ?, keluhan = ? WHERE idKunjungan = ?");
        $stmt->bind_param("sssss", $idPasien, $idDokter, $tanggal, $keluhan, $idKunjungan);
    } else {
        // Insert new record
        $stmt = $koneksi_kunjungan->prepare("INSERT INTO kunjungan (idKunjungan, idPasien, idDokter, tanggal, keluhan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $idKunjungan, $idPasien, $idDokter, $tanggal, $keluhan);
    }

    $stmt->execute();
    $stmt->close();
    header('Location: kunjungan.php');
    exit();
}

if (isset($_GET['idKunjungan'])) {
    $idKunjungan = $_GET['idKunjungan'];
    $koneksi_kunjungan->query("DELETE FROM kunjungan WHERE idKunjungan = '$idKunjungan'");
    header("Location: kunjungan.php");
    exit();
}
?>
