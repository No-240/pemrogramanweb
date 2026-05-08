<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet"href="style.css">
</head>
<body>
    <div class="header">
        <div class="header-left">
            <h1>Data Mahasiswa</h1>
            <p>Manajemen data mahasiswa terdaftar</p>
        </div>
        <a href="tambah.php" class="btn btn-primary">＋ Tambah Mahasiswa</a>
    </div>
    
    <table>
        <tr>
            <th>Foto</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php
        $res = mysqli_query($conn, "SELECT * FROM mahasiswa");
        while ($row = mysqli_fetch_assoc($res)) { ?>
        <tr>
            <td><img src="uploads/<?= $row['foto'] ?>"></td>
            <td><?= $row['nim'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td>
                <a href="form.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="proses.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <script src="script.js"></script>
</body>
</html>
