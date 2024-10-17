<html>
    <head>
        <title> My App | Halaman Utama </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <h3>Tambah Data dokter</h3>
                <form action="koneksi_dokter.php" method="POST">
                    <div class="form-group">
                        <label for="idDokter">ID dokter</label>
                        <input type="text" class="form-control mb-3" name="idDokter" placeholder="ID dokter">
</div>
<div class="form-group">
    <label for="nmDokter">Nama dokter</label>
    <input type="text" class="form-control mb-3" name="nmDokter" placeholder="Nama dokter">
</div>
<div class="form-group">
    <label for="nmDokter">Jenis Kelamin</label>
    <input type="radio" class="form-check-input" name="spesialisasi" value="Perempuan">Perempuan
</div>
<div class="form-group">
    <label for="nmDokter">Jenis Kelamin</label>
    <input type="radio" class="form-check-input" name="spesialisasi" value="Laki-laki">Laki-laki
</div>
<div class="form-grpup mt-3">
    <label for="noTelp">noTelp</label>
    <textarea name="noTelp" id="noTelp" cols="5" rows="3" placeholder="noTelp" class="form-control"></textarea>
</div>
<div class="form-grpup mt-3">
    <input type="submit" name="simpan" value="Simpan" class="form-control btn btn-primary">
</div>
</form>
</div>
</div>
</div>
</body>
</html>