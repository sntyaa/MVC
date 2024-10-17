<!DOCTYPE html>
<html>
<head>
    <title>My App | Halaman Utama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Edit Data dokter</h3>
                <?php
                include 'koneksi_dokter.php';
                $idDokter = $_GET['edit'];
                $stmt = $koneksi_dokter->prepare("SELECT * FROM dokter WHERE idDokter = ?");
                $stmt->bind_param("s", $idDokter);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                ?>
                <form action="koneksi_dokter.php" method="POST">
                    <div class="form-group">
                        <label for="idDokter">ID dokter</label>
                        <input type="text" class="form-control mb-3" name="idDokter" placeholder="ID dokter" value="<?= $row['idDokter'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nmDokter">Nama dokter</label>
                        <input type="text" class="form-control mb-3" name="nmDokter" placeholder="Nama dokter" value="<?= $row['nmDokter'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Jenis Kelamin</label><br>
                        <input type="radio" class="form-check-input" name="spesialisasi" value="Perempuan" <?php if ($row['spesialisasi'] === "Perempuan") echo "checked"; ?> required> Perempuan
                        <input type="radio" class="form-check-input" name="spesialisasi" value="Laki-laki" <?php if ($row['spesialisasi'] === "Laki-laki") echo "checked"; ?> required> Laki-laki
                    </div>
                    <div class="form-group mt-3">
                        <label for="noTelp">noTelp</label>
                        <textarea class="form-control" name="noTelp" id="noTelp" cols="5" rows="3" placeholder="noTelp" required><?= $row['noTelp'] ?></textarea>
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
