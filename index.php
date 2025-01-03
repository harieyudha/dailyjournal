<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Journal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       /* General Body Styles */
    body {
    background-color: #f9f9f9;
    font-family: 'Arial', sans-serif;
    color: #2c3e50;
    margin: 0;
    scroll-behavior: smooth;
    }

    .container-fluid {
    padding: 20px;
    }
    
    .navbar {
    margin-bottom: 20px;
    }

    .hidden {
    display: none;
    }

    /* Header Section */
    .header {
    background-color: #6c757d;
    color: white;
    padding: 20px;
    text-align: center;
    }

    .header h1 {
    margin: 0;
    }

    /* Home Section */
    #home {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    #home h2 {
    font-size: 2rem;
    margin-bottom: 15px;
    }

    #home p {
    color: #6c757d;
    }

    #home .btn {
    margin-top: 15px;
    }

    /* Article Section */
    #article-content {
    padding: 20px;
    }

    #article-content h2 {
    font-size: 2rem;
    color: #343a40;
    margin-bottom: 20px;
    text-align: center;
    }

    #article-content h3 {
    color: #007bff;
    margin-top: 20px;
    }

    #article-content p {
    font-size: 1rem;
    color: #6c757d;
    line-height: 1.6;
    }

    /* Gallery Section */
    #gallery-content {
    padding: 20px;
    }

    #gallery-content h2 {
    font-size: 2rem;
    text-align: center;
    margin-bottom: 20px;
    }

    .gallery-image {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 20px;
    object-fit: cover;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .carousel {
    margin-top: 20px;
    }

    .carousel img {
    width: 100%;
    height: 700px;
    object-fit: cover;
    border-radius: 8px;
    }   

    /* Jadwal Section */
    #Jadwal-content {
    padding: 20px;
    background-color: #f9f9f9;
    }

    .day {
    margin-bottom: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .day-header {
    background-color: #007bff;
    color: white;
    padding: 10px;
    text-align: center;
    font-size: 1.2rem;
    font-weight: bold;
    border-radius: 5px;
    margin-bottom: 15px;
    }

    .schedule {
    margin-top: 10px;
    }

    .course {
    margin-bottom: 10px;
    padding: 15px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
    }

    .course h4 {
    font-size: 1.2rem;
    color: #343a40;
    margin-bottom: 5px;
    }

    .course p {
    margin: 5px 0;
    color: #6c757d;
    font-size: 0.9rem;
    }

    /* Footer */
    footer {
    background-color: #6c757d;
    color: white;
    padding: 10px;
    text-align: center;
    margin-top: 30px;
    font-size: 0.9rem;
    }

    </style>
</head>
<body class="text-center">
<div class="container-fluid">
    <!-- Header -->
    <div class="header text-center">
        <h1>Daily Journal</h1>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#home" onclick="showContent('home')">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#article-content" onclick="showContent('article-content')">Article</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery-content" onclick="showContent('gallery-content')">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Jadwal-content" onclick="showContent('Jadwal-content')">Jadwal</a></li>
                    <button class="btn btn-outline-white" type="button" onclick="location.href='logout.php'">Log Out</button>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div id="main-content">
        <!-- Default Home Content -->
        <div id="home" class="section">
            <div class="container text-center">
                <h2>Welcome to Daily Journal</h2>
                <p>Your go-to journal for daily updates and memories.</p>
            </div>
            <div class="container mt-4">
                <h3>Artikel Day 1</h3>
                <p>
                    Hari pertama dinus inside 2023 sudah di tentukan untuk memakai kemeja putih dan celana berwarna hitam,ikat pinggang berwarna hitam, sepatu berwarna hitam dan dasi berwarna hitam. Ada juga penugasan makan dan minum serta membawa snack taro, ciki ball, susu 250ml, dan air putih 1L. Di hari pertama ini saya merasa senang sekali karena akan bertemu dengan teman-teman baru yang tentunya bukan dari Semarang saja. Saya mendapatkan kelompok STI18, yang terdiri dari teman saya dari Pekalongan dan Rembang. Sangat seru di hari pertama ini diperkenalkan dengan e-gamelan, catur AI, dan masih banyak lagi. Setelah itu, lanjut dengan ISOMA, kemudian pengenalan pertukaran mahasiswa dari US. Acara hari pertama ditutup sampai jam 5.
                </p>
                <a href="#article-content" onclick="showContent('article-content')" class="btn btn-primary">Baca Selengkapnya</a>
            </div>
            <div class="container mt-4">
                <h3>Gallery Highlights</h3>
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/day6.jpg.jfif" class="gallery-image" alt="Highlight 1">
                    </div>
                    <div class="col-md-6">
                        <img src="img/day5.jpg.jfif" class="gallery-image" alt="Highlight 2">
                    </div>
                    <div class="col-md-6">
                        <img src="img/day4.jpg.jfif" class="gallery-image" alt="Highlight 3">
                    </div>
                    <div class="col-md-6">
                        <img src="img/day3.jpg.jfif" class="gallery-image" alt="Highlight 4">
                    </div>
                </div>
                <a href="#gallery-content" onclick="showContent('gallery-content')" class="btn btn-primary mt-3">Lihat Lebih Banyak</a>
            </div>
            <div class="container mt-4">
                <h3>Jadwal</h3>
                <div class="day">
            <div class="day-header">
                <span>Senin</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>LIBUR</h4>
                </div>
            </div>
            <a href="#gallery-content" onclick="showContent('Jadwal-content')" class="btn btn-primary mt-3">Baca Selengkapnya</a>
        </div>
        </div>
    </div>

    <!-- Article Section -->
    <div id="article-content" class="section hidden">
        <div class="container">
            <h2 class="text-center">Article</h2>
            <h3>DAY 1. Senin, 4 September 2023</h3>
        <p>Hari pertama dinus inside 2023 sudah di tentukan untuk memakai kemeja putih dan celana berwarna hitam, ikat pinggang berwarna hitam, sepatu berwarna hitam dan dasi berwarna hitam. Ada juga penugasan makan dan minum serta membawa snack taro, ciki ball, susu 250ml, dan air putih 1L. Di hari pertama ini saya merasa senang sekali karena akan bertemu dengan teman-teman baru yang tentunya bukan dari Semarang saja. Saya mendapatkan kelompok STI18, yang terdiri dari teman saya dari Pekalongan dan Rembang. Sangat seru di hari pertama ini diperkenalkan dengan e-gamelan, catur AI, dan masih banyak lagi. Setelah itu, lanjut dengan ISOMA, kemudian pengenalan pertukaran mahasiswa dari US. Acara hari pertama ditutup sampai jam 5.</p>
        <h3>DAY 2. Selasa, 5 September 2023</h3>
        <p>Hari kedua memakai kemeja putih, celana coklat, tali suspender pin orma 10, dan dasi kupu-kupu warna hitam. Tidak lupa membawa bekal yang sudah ditentukan oleh kakak pembimbing. Saya berangkat jam 06:00 dan sampai di kampus langsung pengecekan barisan, diikuti dengan materi di kelas masing-masing, kemudian ISOMA, dan mendapatkan penugasan dari dosen wali dan pendamping.</p>
        <h3>DAY 3. Rabu, 6 September 2023</h3>
         <p>Hari ketiga, hari terakhir ospek, memakai baju biru, celana hitam, dan sepatu hitam. Di awal acara disambut dengan pentas MABA yang ditugaskan, kemudian bimbingan dosen wali di kelas yang sudah ditentukan, lalu pindah ke aula KORLAP. Di sesi ketiga, inagurasi, kemudian persiapan untuk Dinus Night Festival dengan guest star KOTAK. Sangat seru sekali, basah-basahan dengan teman sekelompok STI dan selesai jam 10 malam. Saya pulang di hari ketiga ini, yang merupakan hari terakhir yang sangat seru karena saya mengikuti acara dari pagi sampai malam melihat band KOTAK dan juga mengenal banyak teman dari kelompok STI lainnya.</p>
        </div>
    </div>

    <!-- Gallery Section -->
    <div id="gallery-content" class="section hidden">
        <div class="container text-center">
            <h2>Gallery</h2>
        </div>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/day6.jpg.jfif" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/day5.jpg.jfif" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/day4.jpg.jfif" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Jadwal Section -->
  <div id="Jadwal-content" class="section hidden">
    <div class="container">
        <h2 class="text-center">Jadwal Lengkap</h2>
        <div class="day">
            <div class="day-header">
                <span>Senin</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>LIBUR</h4>
                </div>
            </div>
        </div>
        
        <div class="day">
            <div class="day-header">
                <span>SELASA</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>Pendidikan Kewarganegaraan</h4>
                    <p><strong>08.40 - 10.20</strong> | AULA E.3.1</p>
                </div>
                <div class="course">
                    <h4>Basis Data</h4>
                    <p><strong>12.30 - 14.10</strong> | H.5.14</p>
                </div>
                <div class="course">
                    <h4>Sistem Operasi</h4>
                    <p><strong>15.30 - 18.00</strong> | H.4.7</p>
                </div>
            </div>
        </div>

        <div class="day">
            <div class="day-header">
                <span>RABU</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>Sistem Informasi</h4>
                    <p><strong>12.30 - 15.00</strong> | H.5.10</p>
                </div>
            </div>
        </div>
        <div class="day-header">
                <span>Kamis</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>Pemrograman Berbasis WEB</h4>
                    <p><strong>14.10 - 15.50</strong> | D.2.J</p>
                 </div>
                 <div class="course">
                    <h4>Basis Data</h4>
                    <p><strong>16.20 - 18.00</strong> | D.3.M</p>
                 </div>
                </div>
                <div class="day">
            <div class="day-header">
                <span>Jumat</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>Progbabilitas Dan Stastistika</h4>
                    <p><strong>15.30 - 18.00</strong> | H.4.8</p>
                </div>
                <div class="course">
                    <h4>RPL</h4>
                    <p><strong>09.30 - 12.00</strong> | H.4.10</p>
                </div>
                <div class="course">
                    <h4>Logika Infort</h4>
                    <p><strong>15.30 - 18.00</strong> | H.4.7</p>
                </div>
            </div>
        </div>

        <div class="day">
            <div class="day-header">
                <span>Sabtu</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>LIBUR</h4>
                </div>
            </div>
        </div>

        <div class="day">
            <div class="day-header">
                <span>Minggu</span>
            </div>
            <div class="schedule">
                <div class="course">
                    <h4>LIBUR</h4>
                </div>
            </div>
        </div>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; 2024 Fakhrizal Harie Yudha</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script>
    function showContent(contentId) {
        // Hide all sections
        const sections = document.querySelectorAll('.section');
        sections.forEach(section => section.classList.add('hidden'));

        // Show selected section
        document.getElementById(contentId).classList.remove('hidden');
    }
</script>
</body>
</html>

