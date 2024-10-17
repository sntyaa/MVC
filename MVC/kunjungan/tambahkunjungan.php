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
                <h3>Tambah Data Kunjungan</h3>
                <form action="koneksi_kunjungan.php" method="POST">
                    <div class="form-group">
                        <label for="idKunjungan">ID Kunjungan</label>
                        <input type="text" class="form-control mb-3" name="idKunjungan" placeholder="ID Kunjungan" required>
                    </div>
                    <div class="form-group">
                        <label for="idPasien">ID Pasien</label>
                        <input type="text" class="form-control mb-3" name="idPasien" placeholder="ID Pasien" required>
                    </div> 
                    <div class="form-group">
                        <label for="idDokter">ID Dokter</label>
                        <input type="text" class="form-control mb-3" name="idDokter" placeholder="ID Dokter" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control mb-3" name="tanggal" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" cols="5" rows="3" placeholder="Keluhan" class="form-control" required></textarea>
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
