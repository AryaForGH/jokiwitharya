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

        /* Menggunakan grid untuk membagi layout */
        .dashboard-container {
            display: flex;
            flex-direction: column; /* Mengatur layout menjadi kolom */
            height: 100vh;
            overflow: hidden; /* Mencegah overflow dari konten */
        }

        /* Konten Utama */
        .main-content {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-grow: 1; /* Memungkinkan konten utama untuk mengambil ruang yang tersedia */
            display: flex;
            flex-direction: column; /* Membuat konten di dalam kolom */
            align-items: center; /* Mengatur konten di tengah */
            overflow: auto; Memungkinkan scroll jika konten melebihi tinggi
        }

        .main-content h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Gaya untuk bagian profil */
        .profile {
            text-align: center;
            margin-bottom: 20px; /* Memberi jarak antara profil dan gambar */
        }

        .profile img {
            width: 100px; /* Ukuran gambar profil */
            border-radius: 50%; /* Membuat gambar profil bulat */
            margin-bottom: 10px;
        }

        .profile h2 {
            font-size: 24px;
            color: #333;
        }

        .profile p {
            font-size: 16px;
            color: #666;
        }

        /* Gaya untuk gambar dengan rasio 3:4 */
        .dashboard-image {
            width: 50%; /* Membuat gambar menempati 50% dari lebar konten */
            aspect-ratio: 3 / 4; /* Menetapkan rasio 3:4 */
            object-fit: cover; /* Menjaga gambar tetap terpotong dengan baik jika perlu */
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambah bayangan agar gambar lebih estetik */
            display: none; /* Sembunyikan semua gambar secara default */
        }

        .dashboard-image.active {
            display: block; /* Hanya gambar aktif yang ditampilkan */
        }

        /* Footer */
        .footer {
            background-color: #333; /* Warna latar belakang footer */
            color: white; /* Warna teks footer */
            text-align: center; /* Teks footer berada di tengah */
            padding: 10px; /* Ruang di dalam footer */
            position: relative; /* Memastikan posisi footer tetap di bawah */
        }

        /* Responsif: untuk tampilan layar kecil */
        @media (max-width: 768px) {
            .dashboard-image {
                width: 80%; /* Lebar gambar pada layar kecil */
            }

            .profile img {
                width: 80px; /* Ukuran gambar profil pada layar kecil */
            }

            .main-content h1 {
                font-size: 28px; /* Ukuran judul pada layar kecil */
            }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- Konten Utama -->
    <div class="main-content">
        <!-- Bagian Profil -->
        <div class="profile">
            <h2>Arya Ramadhan</h2>
            <p>Saya adalah Mahasiswa Teknik Informatika dari Institut Teknologi Pagar Alam</p>
        </div>

        <!-- Gambar yang disimpan di folder assets -->
        <img src="<?php echo base_url('images/1.jpg'); ?>" alt="Gambar Dashboard 1" class="dashboard-image">
        <img src="<?php echo base_url('images/2.jpg'); ?>" alt="Gambar Dashboard 2" class="dashboard-image">
        <img src="<?php echo base_url('images/c.jpg'); ?>" alt="Gambar Dashboard 3" class="dashboard-image">

    </div>
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
</script>

</body>
</html>
