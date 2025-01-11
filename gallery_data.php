
<?php
include "koneksi.php"; // Pastikan file koneksi sudah benar

// Pengaturan jumlah data per halaman
$limit = 10; // Jumlah data per halaman
$page = isset($_POST['hlm']) ? (int)$_POST['hlm'] : 1; // Halaman saat ini
$start = ($page > 1) ? ($page * $limit) - $limit : 0; // Indeks awal data

// Query untuk mengambil data gallery
$query = "SELECT * FROM gallery LIMIT {$start}, {$limit}";
$result = $conn->query($query);

// Cek jika query berhasil dijalankan
if ($result && $result->num_rows > 0) {
    // Menampilkan data
    echo '<table class="table table-bordered">';
    echo '<thead><tr><th>Judul</th><th>Gambar</th><th>Aksi</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        // Validasi data array agar tidak terjadi error
        $judul = isset($row['judul']) ? htmlspecialchars($row['judul']) : 'Tidak ada judul';
        $gambar = isset($row['gambar']) ? 'img/' . htmlspecialchars($row['gambar']) : 'img/default.jpg';

        echo '<tr>';
        echo '<td>' . $judul . '</td>';
        echo '<td><img src="' . $gambar . '" width="100"></td>';
        echo '<td>
                <button class="btn btn-warning edit" data-id="' . $row['id'] . '">Edit</button>
                <button class="btn btn-danger delete" data-id="' . $row['id'] . '">Delete</button>
              </td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    // Query untuk menghitung total data gallery
    $totalResult = $conn->query("SELECT COUNT(*) as total FROM gallery");
    if ($totalResult && $totalResult->num_rows > 0) {
        $total = $totalResult->fetch_assoc()['total'];
    } else {
        $total = 0; // Jika query gagal atau tidak ada data
    }

    // Menampilkan pagination
    $pages = ceil($total / $limit);
    if ($pages > 0) {
        echo '<div class="pagination">';
        for ($i = 1; $i <= $pages; $i++) {
            echo '<button class="halaman btn btn-link" id="' . $i . '">' . $i . '</button>';
        }
        echo '</div>';
    }
} else {
    // Jika tidak ada data
    echo '<p>Tidak ada data gallery.</p>';
}

// Debugging jika terjadi masalah
if ($conn->error) {
    echo '<p>Error: ' . $conn->error . '</p>';
}
?>
