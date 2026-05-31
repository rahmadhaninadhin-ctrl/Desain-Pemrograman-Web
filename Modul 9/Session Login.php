<?php
// Latihan 9.8 - Session Login
session_start();

// Fungsi sanitasi input
function bersihkan($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$pesanLogin = "";

// Jika sudah login
if (isset($_SESSION["userName"])) {
    if (isset($_GET["keluar"])) {
        session_destroy();
        header("Location: session_login.php?logout=1");
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <style>
            body { font-family: Arial; }
            .success { color: green; }
        </style>
    </head>
    <body>
        <h2>Dashboard</h2>
        <p class="success">Selamat datang, <b><?php echo $_SESSION["userName"]; ?></b>!</p>
        <p>ID Session: <?php echo session_id(); ?></p>
        <a href="session_login.php?keluar=1">Logout</a>
    </body>
    </html>
    <?php
    exit();
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = bersihkan($_POST["username"]);
    $userPass = bersihkan($_POST["password"]);

    // Simulasi validasi login (username: user123, password: rahasia)
    if ($userName === "user123" && $userPass === "rahasia") {
        $_SESSION["userName"] = $userName;
        header("Location: session_login.php");
        exit();
    } else {
        $pesanLogin = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Session</title>
    <style>
        body { font-family: Arial; }
        .error { color: red; font-size: 12px; }
        form { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Silakan Login</h2>
    
    <?php if (!empty($pesanLogin)) { ?>
        <p class="error"><?php echo $pesanLogin; ?></p>
    <?php } ?>
    
    <?php if (isset($_GET["logout"])) { ?>
        <p class="success">Anda berhasil logout.</p>
    <?php } ?>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <p><small>Username: user123, Password: rahasia</small></p>
</body>
</html>
