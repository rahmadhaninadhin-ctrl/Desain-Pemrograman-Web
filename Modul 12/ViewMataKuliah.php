<?php
  include("koneksi.php");
  $db = new Database();
  $con = $db->getConnection();

  $search = "";
  if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = $_GET['search'];
      $stmt = $con->prepare("SELECT * FROM t_matakuliah WHERE namaMK LIKE ? ORDER BY kodeMK ASC");
      $searchParam = "%$search%";
      $stmt->bind_param("s", $searchParam);
  } else {
      $stmt = $con->prepare("SELECT * FROM t_matakuliah ORDER BY kodeMK ASC");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah (OOP) — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA OOP <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="viewmahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Mata Kuliah (OOP)</h1>
        <p>Kelola data mata kuliah dengan implementasi Object-Oriented Programming</p>
    </div>

    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewmatakuliah.php">
                <input type="text" name="search" placeholder="🔍 Cari berdasarkan nama mata kuliah..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputmatakuliah.php" class="btn btn-primary">+ Tambah Mata Kuliah</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Jam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $stmt->execute();
                  $result = $stmt->get_result();

                  if ($result->num_rows > 0) {
                      while ($data = $result->fetch_assoc())
                      {
                          echo "<tr>";
                          echo "<td>{$data['kodeMK']}</td>";
                          echo "<td>" . htmlspecialchars($data['namaMK']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['sks']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['jam']) . "</td>";
                          echo '<td class="action-links">
                              <a href="editmatakuliah.php?kodeMK='.$data['kodeMK'].'" class="btn btn-warning btn-sm">✏️ Edit</a>
                              <a href="hapusmatakuliah.php?kodeMK='.$data['kodeMK'].'" class="btn btn-danger btn-sm"
                                  onclick="return confirm(\'Anda yakin akan menghapus data?\')">🗑️ Hapus</a>
                          </td>';
                          echo "</tr>";
                      }
                  } else {
                      echo '<tr><td colspan="5"><div class="empty-state"><div class="icon">📭</div><p>Belum ada data mata kuliah' . ($search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '') . '</p></div></td></tr>';
                  }
                  
                  $stmt->close();
                  $con->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>