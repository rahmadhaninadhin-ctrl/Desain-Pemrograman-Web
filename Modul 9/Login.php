<?php
// Fungsi untuk membersihkan input
function filter_inputan($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$userErr = $passErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $userErr = "Nama pengguna wajib diisi";
    } else {
        $username = filter_inputan($_POST["username"]);
    }

    if (empty($_POST["password"])) {
        $passErr = "Kata sandi wajib diisi";
    } else {
        $password = filter_inputan($_POST["password"]);
    }

    // Jika tidak ada error, tampilkan pesan sukses
    if (empty($userErr) && empty($passErr)) {
        echo "<div style='color:green; font-weight:bold;'>Login berhasil! Selamat datang, $username</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Login</title>
    <style>
        .error { color: red; font-size: 12px; }
    </style>
</head>
<body>
    <h2>Form Login Mahasiswa</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nama Pengguna: <input type="text" name="username" placeholder="Masukkan username" required>
        <span class="error">* <?php echo $userErr; ?></span>
        <br><br>
        Kata Sandi: <input type="password" name="password" placeholder="Masukkan password" required>
        <span class="error">* <?php echo $passErr; ?></span>
        <br><br>
        <input type="submit" value="Masuk">
        <input type="reset" value="Bersihkan">
    </form>
</body>
</html>
