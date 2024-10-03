<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .code-disc {
            font-size: 15px; 
            color: green;
            display: flex;
            cursor: pointer;
            border-radius: 10px;
            text-decoration: none;
            font-family: myriad pro regular;
        }

        /* Menggunakan grid untuk membagi layout */
        .dashboard-container {
            display: grid;
            grid-template-columns: 12fr;
            height: 100vh;
        }

        /* Konten Kiri */
        .main-content {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: left;
            align-items: left;
            flex-direction: column; /* Agar konten bisa ditampilkan dalam kolom */
        }

        .main-content h1 {
            font: Helvetica;
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Gaya untuk gambar dengan rasio 3:4 */
        .dashboard-image {
            font-family: Helvetica;
            object-fit: cover; /* Menjaga gambar tetap terpotong dengan baik jika perlu */
            border-radius: 10px;
            color: black;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambah bayangan agar gambar lebih estetik */
        }

        .dashboard-image.active {
            display: block; /* Hanya gambar aktif yang ditampilkan */
        }

        /* Sidebar Kanan untuk User Info */
        .sidebar {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Agar konten berada di atas */
            width: 100%; /* Sidebar penuh pada layar desktop */
            height: 100%;
            position: relative;
        }

        .sidebar h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .sidebar .a-logout {
            display: inline-block;
            margin-bottom: 20px; /* Memberi jarak antara logout dan list */
            padding: 8px 16px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .sidebar .a-logout:hover {
            background-color: #c82333;
        }

        /* Tombol untuk daftar di sidebar */
        .user-button {
            display: block;
            margin: 10px 0; /* Memberi jarak antar item tombol */
            padding: 10px;
            background-color: #333; /* Warna latar belakang tombol */
            color: white; /* Warna teks */
            text-align: center; /* Teks berada di tengah */
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer; /* Menunjukkan bahwa ini adalah tombol */
            transition: background-color 0.3s ease; /* Transisi warna latar belakang */
        }

        .user-button:hover {
            background-color: #555; /* Warna saat kursor melayang */
        }

        /* Tombol hamburger */
        .menu-hamburger {
            display: none; /* Sembunyikan tombol pada layar besar */
            position: absolute;
            top: 8px;
            right: 50px;
            background-color: #333;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .menu-hamburger:hover {
            background-color: #555;
        }

        /* Responsif: untuk tampilan layar kecil */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr; /* Mengubah menjadi layout satu kolom pada layar kecil */
            }

            .menu-hamburger {
                display: block; /* Tampilkan tombol hamburger pada layar kecil */
            }

            /* Sembunyikan sidebar di luar layar pada layar kecil */
            .sidebar {
                position: absolute;
                right: 0;
                width: 60%;
                transform: translateX(100%); /* Sidebar tersembunyi di luar layar */
                transition: transform 0.3s ease; /* Animasi saat sidebar muncul/menghilang */
            }

            /* Tampilkan sidebar ketika tombol hamburger diklik */
            .sidebar.visible {
                transform: translateX(0); /* Sidebar muncul pada layar kecil */
            }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- Konten Kiri -->
    <div class="main-content">
        <!-- Deskripsi Joki -->
        <h3>Klik Di Sini untuk Joki!
            <a href="https://wa.me/6285809575164" class="code-disc">Click Here</a></h3>
            
            <h3>Klik Di Sini untuk Melihat Layanan!
                <a href="<?php echo base_url()?>index.php/service" class="code-disc">Service</a></h3>
                <hr>
                <hr>
                <p>Joki adalah layanan yang memungkinkan Anda untuk mendapatkan bantuan dalam menyelesaikan tugas-tugas tertentu, seperti bermain game, mengerjakan tugas kuliah, atau lainnya. Tim kami siap membantu Anda untuk mencapai tujuan dengan cepat dan efisien.</p>
    </div>

    <!-- Tombol hamburger -->
    
</div>

<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.dashboard-image');

    function showSlides() {
        // Sembunyikan semua gambar
        slides.forEach(slide => {
            slide.classList.remove('active');
        });

        // Tentukan gambar selanjutnya
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        // Tampilkan gambar yang sesuai
        slides[slideIndex - 1].classList.add('active');

        // Ulangi setiap 3 detik
        setTimeout(showSlides, 3000);
    }

    // Memulai slideshow saat halaman di-load
    showSlides();

    // Script untuk membuka/tutup sidebar dengan tombol hamburger
    const menuHamburger = document.getElementById('menuHamburger');
    const sidebar = document.getElementById('sidebar');

    menuHamburger.addEventListener('click', () => {
        sidebar.classList.toggle('visible'); // Tampilkan/tutup sidebar dengan toggle kelas "visible"
    });
</script>

</body>
</html>
