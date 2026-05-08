<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    
    // Logika Upload Foto
    $foto_name = $_FILES['foto']['name'];
    if ($foto_name != "") {
        $ext = pathinfo($foto_name, PATHINFO_EXTENSION);
        $new_name = uniqid() . "." . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $new_name);
        $foto_db = $new_name;
    }

    if ($id == "") { // Insert
        mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jurusan, foto) VALUES ('$nim', '$nama', '$jurusan', '$foto_db')");
    } else { // Update
        if ($foto_name != "") {
            mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', foto='$foto_db' WHERE id=$id");
        } else {
            mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id=$id");
        }
    }
    echo "<script>alert('Sukses!'); window.location='index.php';</script>";
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    header("Location: index.php");
}
?>