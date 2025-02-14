<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h5>felixyung_2802394462</h5>
<h1>Daftar Karyawan</h1>
<a href='add.php'>Tambah Karyawan</a>

<table>
    <tr>
        <th>Nama</th>
        <th>Umur</th>
        <th>Alamat</th>
        <th>Nomor Telepon</th>
        <th>Edit | Hapus</th>
    </tr>

    <?php
    $file = 'data.json';
    $data = json_decode(file_get_contents($file), true) ?? [];

    foreach ($data as $key => $karyawan) {
        echo "<tr>
            <td>{$karyawan['nama']}</td>
            <td>{$karyawan['umur']}</td>
            <td>{$karyawan['alamat']}</td>
            <td>{$karyawan['telepon']}</td>
            <td>
                <a href='edit.php?id=$key'>Edit</a> |
                <a href='delete.php?id=$key'>Hapus</a>
            </td>
        </tr>";
    }
    ?>
</table>

</body>
</html>

