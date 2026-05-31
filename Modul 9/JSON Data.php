<?php
// Latihan - Konversi Array ke JSON
header("Content-Type: text/html; charset=UTF-8");

// Data mahasiswa
$mahasiswa = [
    ["nama" => "Nadhin", "nim" => "20230101", "jurusan" => "Teknik Informatika"],
    ["nama" => "Raka",   "nim" => "20230102", "jurusan" => "Sistem Informasi"],
    ["nama" => "Siti",   "nim" => "20230103", "jurusan" => "Manajemen Informatika"]
];

// Konversi ke JSON
$jsonData = json_encode($mahasiswa, JSON_PRETTY_PRINT);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa - JSON</title>
    <style>
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        pre { background: #eee; padding: 10px; }
    </style>
</head>
<body>
    <h2>Data Mahasiswa dalam Array</h2>
    <table>
        <tr><th>Nama</th><th>NIM</th><th>Jurusan</th></tr>
        <?php foreach ($mahasiswa as $mhs) { ?>
            <tr>
                <td><?php echo $mhs["nama"]; ?></td>
                <td><?php echo $mhs["nim"]; ?></td>
                <td><?php echo $mhs["jurusan"]; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Data Mahasiswa dalam JSON</h2>
    <pre><?php echo $jsonData; ?></pre>
</body>
</html>
