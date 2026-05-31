<?php
// Fungsi untuk membersihkan input
function filter_inputan($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Komentar</title>
</head>
<body>
    <h2>Kotak Komentar</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama Lengkap: <input type="text" name="namaLengkap" placeholder="Masukkan nama" required><br><br>
        E-mail: <input type="email" name="email" placeholder="contoh@email.com" required><br><br>
        Pesan Anda: <textarea name="pesan" rows="5" cols="40" placeholder="Tuliskan komentar..." required></textarea><br><br>
        <input type="submit" value="Kirim">
        <input type="reset" value="Bersihkan">
    </form>
    <hr>

    <?php
        $namaLengkap = $email = $pesan = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $namaLengkap = filter_inputan($_POST["namaLengkap"]);
            $email = filter_inputan($_POST["email"]);
            $pesan = filter_inputan($_POST["pesan"]);

            echo "<h3>Hasil Input:</h3>";
            echo "<ul>";
            echo "<li>Nama : $namaLengkap</li>";
            echo "<li>Email : $email</li>";
            echo "<li>Komentar : $pesan</li>";
            echo "</ul>";
            echo "<hr>";
        }
    ?>
</body>
</html>
