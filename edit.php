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

    mysqli_query($koneksi, "UPDATE buku SET kode_buku='$kode_buku', no_buku='$no_buku', judul_buku='$judul_buku', tahun_terbit='$tahun_terbit',penulis='$penulis', 
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
</head>
<body>
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



