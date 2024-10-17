<!DOCTYPE html>
<html>
<head>
    <title>My App | Halaman Kunjungan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Edit Data Kunjungan</h3>
                <?php
                include 'koneksi_kunjungan.php';
                if (isset($_GET['edit'])) {
                    $idKunjungan = $_GET['edit'];
                    $stmt = $koneksi_kunjungan->prepare("SELECT * FROM kunjungan WHERE idKunjungan = ?");
                    $stmt->bind_param("s", $idKunjungan);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $stmt->close();
                } else {
                    echo "No ID Kunjungan provided.";
                    exit();
                }
                ?>
                <form action="koneksi_kunjungan.php" method="POST">
                    <div class="form-group">
                        <label for="idKunjungan">ID Kunjungan</label>
                        <input type="text" class="form-control mb-3" name="idKunjungan" placeholder="ID Kunjungan" value="<?= $row['idKunjungan'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="idPasien">ID Pasien</label>
                        <input type="text" class="form-control mb-3" name="idPasien" placeholder="ID Pasien" value="<?= $row['idPasien'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="idDokter">ID Dokter</label>
                        <input type="text" class="form-control mb-3" name="idDokter" placeholder="ID Dokter" value="<?= $row['idDokter'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control mb-3" name="tanggal" value="<?= $row['tanggal'] ?>" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="keluhan">Keluhan</label>
                        <textarea class="form-control" name="keluhan" id="keluhan" cols="5" rows="3" placeholder="Keluhan" required><?= $row['keluhan'] ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" name="simpan" value="Simpan" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
