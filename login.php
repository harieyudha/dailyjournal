<?php
// Memulai session atau melanjutkan session yang sudah ada
session_start();

// Menyertakan file koneksi database
include "koneksi.php";

// Inisialisasi variabel untuk error login
$loginError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil input username dan password
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username) || empty($password)) {
        $loginError = "Username dan Password tidak boleh kosong.";
    } else {
        // Enkripsi password dengan md5
        $password = md5($password);

        // Prepared statement untuk keamanan
        $stmt = $conn->prepare("SELECT username FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password); // Parameter binding

        // Menjalankan query
        $stmt->execute();

        // Menampung hasil query
        $hasil = $stmt->get_result();

        // Cek apakah user ditemukan
        if ($hasil->num_rows > 0) {
            $row = $hasil->fetch_assoc();
            $_SESSION['username'] = $row['username']; // Simpan username di session
            header("Location: admin.php"); // Redirect ke halaman admin
            exit();
        } else {
            $loginError = "Username atau Password salah.";
        }

        // Tutup statement dan koneksi
        $stmt->close();
    }

    $conn->close();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
            background-image: url("https://upload.wikimedia.org/wikipedia/commons/b/ba/Dinus_evening-1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            margin: 0; 
            /* background: linear-gradient(to bottom right, #e0f7fa, #e6eeff); */
        }

        .form-signin {
            max-width: 330px;
            padding: 20px;
            border: 1px solid #ddd; 
            border-radius: 8px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }

        .form-signin img {
            margin-bottom: 20px;
        }

        .form-signin button {
            margin-top: 10px;
        }
    </style>
</head>
<body class="text-center">
    <main class="form-signin">
        <form method="POST">
            <img class="mb-4" src="img/day7.jpg.png" alt="" width="75" height="90">
            <h1 class="h3 mb-3 fw-normal">Sign In To Daily Journal</h1>
            <?php if (!empty($loginError)): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($loginError); ?></div>
            <?php endif; ?>
            <div class="form-floating">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; Fakhrizal Harie Yudha 2024-<?=date('Y')?></p>
        </form>
    </main>
</body>
</html>
