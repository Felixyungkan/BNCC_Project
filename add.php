<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'data.json';
    $data = json_decode(file_get_contents($file), true) ?? [];

    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if (strlen($nama) < 5 || strlen($nama) > 20 ||
        $umur <= 20 ||
        strlen($alamat) < 10 || strlen($alamat) > 40 ||
        !preg_match('/^08[0-9]{7,10}$/', $telepon)) {
        echo "Data tidak valid!";
    } else {
        $data[] = compact('nama', 'umur', 'alamat', 'telepon');
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

        header("Location: index.php");
        exit;
    }
}
?>

<form method="post">
    <label>Nama:</label><input type="text" name="nama" required><br>
    <label>Umur:</label><input type="number" name="umur" required><br>
    <label>Alamat:</label><input type="text" name="alamat" required><br>
    <label>No. Telepon:</label><input type="text" name="telepon" required><br>
    <button type="submit">Tambah</button>
</form>

<a href="index.php">Kembali ke Menu Utama</a>
