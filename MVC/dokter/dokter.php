<!DOCTYPE html>
<html>
<head>
    <title>My App | Halaman Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expabd-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="../pasien/pasien.php" class="navbar-brand">My App</a>
                <a href="../dokter/dokter.php" class="navbar-brand">Dokter</a>
                <a href="../kunjungan/kunjungan.php" class="navbar-brand">Data Kunjungan</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedtedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContenct">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link" aria-currents="page">dokter</a>
                        </li>
                    </ul>
                </div>
            </div>
</nav>
<div class="row mt-3">
    <div class="col-sm">
        <h3>Tabel Dokter</h3>
</div>
</div>
<div class="row">
    <div class="col">
        <a href="tambahdokter.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <table class="table table-stripped table-hover tabel-sm">
            <tr>
                <th>No</th>
                <th>ID dokter</th>
                <th>Nama dokter</th>
                <th>noTelp</th>
                <th>Action</th>
            </tr>
            <?php
            include 'koneksi_dokter.php';
            $no = 1;
            $hasil = $koneksi_dokter->query("SELECT * FROM dokter");

            while ($row = $hasil->fetch_assoc()) {
                ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['idDokter']; ?></td>
                <td><?= $row['nmDokter']; ?></td>
                <td><?= $row['noTelp']; ?></td>
                <td><a href="editdokter.php?edit=<?= $row['idDokter']; ?>" class="btn btn-warning btn-sm"> Edit</a><a href="koneksi_dokter.php?idDokter=<?= $row['idDokter']; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
</div>
            </div>
            </body>
            </html>