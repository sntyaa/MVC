<?php
$koneksi = new mysqli('localhost', 'root', '', 'sintya_xipplg2');

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

if (isset($_POST['simpan'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    // Check if the record already exists to determine whether to insert or update
    $stmt = $koneksi->prepare("SELECT * FROM pasien WHERE idPasien = ?");
    $stmt->bind_param("s", $idPasien);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing record
        $stmt = $koneksi->prepare("UPDATE pasien SET nmPasien = ?, jk = ?, alamat = ? WHERE idPasien = ?");
        $stmt->bind_param("ssss", $nmPasien, $jk, $alamat, $idPasien);
    } else {
        // Insert new record
        $stmt = $koneksi->prepare("INSERT INTO pasien (idPasien, nmPasien, jk, alamat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $idPasien, $nmPasien, $jk, $alamat);
    }

    $stmt->execute();
    $stmt->close();
    header('Location: pasien.php');
}

if (isset($_GET['idPasien'])) {
    $idPasien = $_GET['idPasien'];
    $koneksi->query("DELETE FROM pasien WHERE idPasien = '$idPasien'");
    header("location:pasien.php");
}
?>