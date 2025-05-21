<?php
session_start();
include 'koneksi.php';

if(isset($_POST['tambah'])){
    $kode_buku = $_POST['kode_buku'];
    $no_buku = $_POST['no_buku'];
    $judul_buku = $_POST['judul_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $penerbit = $_POST['penulis'];
    $nama_penulis = $_POST['penerbit'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $harga = $_POST['harga'];
    $gambar_buku = $_POST['gambar_buku'];

    $sql = "INSERT INTO buku(kode_buku, no_buku, judul_buku, tahun_terbit, penulis, penerbit, jumlah_halaman, harga, gambar_buku)
            VALUES('$kode_buku','$no_buku','$judul_buku','$tahun_terbit','$penulis','$penerbit','$jumlah_halaman','$harga','$gambar_buku')";
    $mysqli_query = mysqli_query($koneksi, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f3ff; /* Light blue background */
            margin: 0;
            padding: 20px;
        }
        form {
            background: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type="number"],
        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #007bff; /* Blue border */
            border-radius: 4px;
        }
        input[type="submit"] {
            background: #007bff; /* Blue background */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3; /* Darker blue on hover */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff; /* Blue header */
            color: white; /* White text for header */
        }
        img {
            max-width: 80px;
            height: auto;
        }
        a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff; /* Blue links */
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="admin.php" method="post">
        <input type="number" name="kode_buku" placeholder="Kode Buku" required><br>
        <input type="number" name="no_buku" placeholder="No Buku" required><br>
        <input type="text" name="judul_buku" placeholder="Judul Buku" required><br>
        <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required><br>
        <input type="text" name="penulis" placeholder="Penulis" required><br>
        <input type="text" name="penerbit" placeholder="penerbit" required><br>
        <input type="number" name="jumlah_halaman" placeholder="Jumlah Halaman" required><br>
        <input type="number" name="harga" placeholder="Harga" required><br>
        <input type="text" name="gambar_buku" placeholder="Gambar Buku" required><br>
        <input type="submit" name="tambah" value="Tambah">
    </form>
    <table>
        <tr>
            <th>NO BUKU</th>
            <th>KODE BUKU</th>
            <th>JUDUL BUKU</th>
            <th>TAHUN TERBIT</th>
            <th>PENULIS</th>
            <th>PENERBIT</th>
            <th>JUMLAH HALAMAN</th>
            <th>HARGA</th>
            <th>GAMBAR</th>
            <th>AKSI</th>
        </tr>
        <?php
        $mysqli_query = mysqli_query($koneksi, "SELECT * FROM buku");
        while($data = mysqli_fetch_array($mysqli_query)){
            ?>
            <tr>
                <td><?=$data['no_buku'];?></td>
                <td><?=$data['kode_buku'];?></td>
                <td><?=$data['judul_buku'];?></td>
                <td><?=$data['tahun_terbit'];?></td>
                <td><?=$data['penulis'];?></td>
                <td><?=$data['penerbit'];?></td>
                <td><?=$data['jumlah_halaman'];?></td>
                <td><?=$data['harga'];?></td>
                <td><img src="<?=$data['gambar_buku'];?>" alt="cover"></td>
                <td>
                    <a href="edit.php?no_buku=<?=$data['no_buku'];?>">EDIT</a>
                    <a href="hapus.php?no_buku=<?=$data['no_buku'];?>">HAPUS</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
<?php
?>
