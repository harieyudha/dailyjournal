<?php
include "Koneksi.php";
include "upload_foto.php";

// Jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $judul = trim($_POST['judul']);
    $tanggal = date("Y-m-d H:i:s");
    $username = $_SESSION['username'] ?? 'unknown';
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    // Jika ada file yang dikirim
    if (!empty($nama_gambar)) {
        $cek_upload = upload_foto($_FILES['gambar']);

        if ($cek_upload['status']) {
            $gambar = $cek_upload['message'];
        } else {
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=gallery';
            </script>";
            exit;
        }
    }

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = (int)$_POST['id'];
        $gambar_lama = $_POST['gambar_lama'];

        if (empty($nama_gambar)) {
            $gambar = $gambar_lama;
        } else if (file_exists("img/" . $gambar_lama)) {
            unlink("img/" . $gambar_lama);
        }

        $stmt = $conn->prepare("UPDATE gallery SET judul = ?, gambar = ? WHERE id = ?");
        $stmt->bind_param("ssi", $judul, $gambar, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO gallery (judul, gambar) VALUES (?, ?)");
        $stmt->bind_param("ss", $judul, $gambar);
    }

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil disimpan');
            document.location='admin.php?page=gallery';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal disimpan');
            document.location='admin.php?page=gallery';
        </script>";
    }
}

// Jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $id = (int)$_POST['id'];
    $gambar = $_POST['gambar'];

    if (file_exists("img/" . $gambar)) {
        unlink("img/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location='admin.php?page=gallery';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            document.location='admin.php?page=gallery';
        </script>";
    }
}
?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
    <i class="bi bi-plus-lg"></i> Tambah Article
</button>

<table class="table table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th class="w-50">Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM gallery ORDER BY id DESC";
        $hasil = $conn->query($sql);
        $no = 1;

        while ($row = $hasil->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><img src="img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['judul']) ?>" width="100"></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="gambar" value="<?= htmlspecialchars($row['gambar']) ?>">
                        <button type="submit" name="hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row['id'] ?>">Edit</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel">Edit Article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($row['gambar']) ?>">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($row['judul']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </tbody>
</table>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar" required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
