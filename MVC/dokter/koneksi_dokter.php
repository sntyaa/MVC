<?php
$koneksi_dokter = new mysqli('localhost', 'root', '', 'sintya_xipplg2');

if ($koneksi_dokter->connect_error) {
    die("Connection failed: " . $koneksi_dokter->connect_error);
}

if (isset($_POST['simpan'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];

    // Check if the record already exists to determine whether to insert or update
    $stmt = $koneksi_dokter->prepare("SELECT * FROM dokter WHERE idDokter = ?");
    $stmt->bind_param("s", $idDokter);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update existing record
        $stmt = $koneksi_dokter_dokter->prepare("UPDATE dokter SET nmDokter = ?, spesialisasi = ?, noTelp = ? WHERE idDokter = ?");
        $stmt->bind_param("ssss", $nmDokter, $spesialisasi, $noTelp, $idDokter);
    } else {
        // Insert new record
        $stmt = $koneksi_dokter->prepare("INSERT INTO dokter (idDokter, nmDokter, spesialisasi, noTelp) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $idDokter, $nmDokter, $spesialisasi, $noTelp);
    }

    $stmt->execute();
    $stmt->close();
    header('Location: dokter.php');
}

if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    $koneksi_dokter->query("DELETE FROM dokter WHERE idDokter = '$idDokter'");
    header("location:dokter.php");
}
?>
