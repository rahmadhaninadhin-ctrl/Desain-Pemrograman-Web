<?php
require_once "Database.php";

$db = new Database();
$con = $db->getConnection();

$search = "";
$whereClause = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $whereClause = " WHERE namaMhs LIKE '%$search%'";
}

$query = "SELECT * FROM t_mahasiswa" . $whereClause . " ORDER BY npm ASC";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Mahasiswa</h1>
        <p>Kelola data mahasiswa di sistem informasi akademik</p>
    </div>

    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewmahasiswa.php">
                <input type="text" name="search" placeholder="🔍 Cari berdasarkan nama mahasiswa..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputmahasiswa.php" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  if ($result && mysqli_num_rows($result) > 0) {
                      while ($data = mysqli_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>{$data['npm']}</td>";
                          echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['prodi']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                          echo '<td class="action-links">
                              <a href="editmahasiswa.php?npm='.$data['npm'].'" class="btn btn-warning btn-sm">✏️ Edit</a>
                              <a href="hapusmahasiswa.php?npm='.$data['npm'].'" class="btn btn-danger btn-sm"
                                  onclick="return confirm(\'Anda yakin akan menghapus data?\')">🗑️ Hapus</a>
                          </td>';
                          echo "</tr>";
                      }
                  } else {
                      echo '<tr><td colspan="6"><div class="empty-state"><div class="icon">📭</div><p>Belum ada data mahasiswa' . ($search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '') . '</p></div></td></tr>';
                  }
                  mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
