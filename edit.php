<?php
session_start();
include ('koneksi.php');

if(isset($_POST['edit'])){
    $no_lama = $_POST['no_lama'];
    $kode_buku = $_POST['kode_buku'];
    $no_buku = $_POST['no_buku'];
    $judul_buku = $_POST['judul_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $harga = $_POST['harga'];
    $gambar_buku = $_POST['gambar_buku'];

    mysqli_query($koneksi, "UPDATE buku SET kode_buku='$kode_buku', no_buku='$no_buku', judul_buku='$judul_buku', tahun_terbit='$tahun_terbit', penulis='$penulis', 
    penerbit='$penerbit', jumlah_halaman='$jumlah_halaman', harga='$harga', gambar_buku='$gambar_buku'
    WHERE no_buku='$no_lama'");

   header('Location: admin.php'); 
}

if (isset($_GET['no_buku'])) {
    $id = $_GET['no_buku'];
    $sql = mysqli_query($koneksi, "SELECT * FROM buku WHERE no_buku='$id'");
    
    if(mysqli_num_rows($sql) === 0) {
        header('Location: admin.php');
        exit();
    }
    
    $data = mysqli_fetch_assoc($sql);
} else {
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f3ff; /* Light blue background */
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #007bff; /* Blue border */
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #007bff; /* Blue background */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h2>Edit Book</h2>
    <form action="" method="post">
        <input type="hidden" name="no_lama" value="<?= $data['no_buku'] ?>" required><br>
        <input type="text" name="kode_buku" value="<?=$data['kode_buku']?>" required><br>
        <input type="text" name="no_buku" value="<?=$data['no_buku']?>" required><br>
        <input type="text" name="judul_buku" value="<?=$data['judul_buku']?>" required><br>
        <input type="number" name="tahun_terbit" value="<?=$data['tahun_terbit']?>" required><br>
        <input type="text" name="penulis" value="<?=$data['penulis']?>" required><br>
        <input type="text" name="penerbit" value="<?=$data['penerbit']?>" required><br>
        <input type="number" name="jumlah_halaman" value="<?=$data['jumlah_halaman']?>" required><br>
        <input type="number" name="harga" value="<?=$data['harga']?>" required><br>
        <input type="text" name="gambar_buku" value="<?=$data['gambar_buku']?>" required><br>
    
        <input type="submit" name="edit" value="EDIT">
    </form>
</body>
</html>
