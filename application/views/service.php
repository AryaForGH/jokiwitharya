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
            grid-template-columns: 12fr; /* Kolom untuk konten dan sidebar */
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
            display: none; /* Sembunyikan semua gambar secara default */
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

        /* Tabs untuk Joki */
        .tabs {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            background-color: #34495e;
            color: white;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }

        .tab:hover {
            background-color: #1abc9c;
        }

        .content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .columns {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .column {
            flex: 1;
            padding: 20px;
            margin: 0 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .column h4 {
            margin-bottom: 10px;
            color: #333;
        }

        .hidden {
            display: none;
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
        <h1>Joki Services</h1>
        
        <!-- Tabs -->
        <div class="tabs">
            <div class="tab" onclick="showContent('python')">Joki Python</div>
            <div class="tab" onclick="showContent('microsoft')">Joki Microsoft</div>
            <div class="tab" onclick="showContent('database')">Joki Database</div>
            <div class="tab" onclick="showContent('website')">Joki Website</div>
        </div>

        <!-- Gambar yang disimpan di folder assets -->
        <h3>Klik Di Sini untuk Joki!
            <a href="https://wa.me/6285809575164" class="code-disc">Click Here</a></h3>
        <h3 class="dashboard-image" id="python">Layanan Joki Python <a class="code-disc" href="#">Have a Discon Code? Click Here</a></h3>
        <h3 class="dashboard-image" id="microsoft">Layanan Joki Microsoft <a class="code-disc" href="#">Have a Discon Code? Click Here</a></h3>
        <h3 class="dashboard-image" id="database">Layanan Joki Database <a class="code-disc" href="#">Have a Discon Code? Click Here</a></h3>
        <h3 class="dashboard-image" id="website">Layanan Joki Website <a class="code-disc" href="#">Have a Discon Code? Click Here</a></h3>
        
    </div>

    

<div id="content-python" class="content hidden">
    <h3>Joki Python</h3>
    <p>Selamat datang di Joki Python! Kami menawarkan layanan joki untuk proyek Python, tugas sekolah, dan pengembangan perangkat lunak.</p>

    <div class="columns">
        <div class="column">
            <h4>Keuntungan Menggunakan Joki Python:</h4>
            <ul>
                <li>Pekerjaan cepat dan tepat waktu</li>
                <li>Kualitas kode yang tinggi</li>
                <li>Dukungan teknis 24/7</li>
                <li>Customisasi sesuai kebutuhan Anda</li>
                <li>Pengalaman dari pengembang profesional</li>
            </ul>
        </div>
        <div class="column">
            <h4>Tarif Per Joki:</h4>
            <ul>
                <li><strong>Proyek Kecil:</strong> Rp 30.000</li>
                <li><strong>Proyek Menengah:</strong> Rp 50.000</li>
                <li><strong>Proyek Besar:</strong> Rp 100.000</li>
                <li><strong>Konsultasi:</strong> Rp 50.000/jam</li>
            </ul>
        </div>
    </div>
</div>

<div id="content-microsoft" class="content hidden">
    <h3>Joki Microsoft</h3>
    <p>Selamat datang di Joki Microsoft! Kami menawarkan layanan joki untuk yang berhubungan dengan Microsoft.</p>

    <div class="columns">
        <div class="column">
            <h4>Keuntungan Menggunakan Joki Microsoft:</h4>
            <ul>
                <li>Pekerjaan cepat dan tepat waktu</li>
                <li>Hal yang berhubungan dengan Microsoft seperti Makalah, PPT, Excel dll.</li>
                <li>Dukungan teknis 24/7</li>
                <li>Customisasi sesuai kebutuhan Anda</li>
                <li>Pengalaman dari pengembang profesional</li>
            </ul>
        </div>
        <div class="column">
            <h4>Tarif Per Joki:</h4>
            <ul>
                <li><strong>Proyek Word:</strong> Rp 30.000 - Rp.150.000</li>
                <li><strong>Proyek Excel:</strong> Rp 30.000 - Rp.100.000</li>
                <li><strong>Proyek PowerPoint:</strong> Rp 30.000 - Rp.100.000</li>
                <li><strong>Konsultasi:</strong> Rp 30.000/jam</li>
            </ul>
        </div>
    </div>
</div>

<div id="content-database" class="content hidden">
    <h3>Joki Database</h3>
    <p>Butuh bantuan dengan proyek database? Joki Database kami siap membantu Anda dalam merancang dan mengimplementasikan database untuk proyek Anda.</p>

    <div class="columns">
        <div class="column">
            <h4>Keuntungan Menggunakan Joki Database:</h4>
            <ul>
                <li>Desain database yang efisien</li>
                <li>Peningkatan performa aplikasi</li>
                <li>Pemeliharaan dan backup data</li>
                <li>Analisis data yang mendalam</li>
                <li>Pengalaman dalam berbagai sistem database</li>
            </ul>
        </div>
        <div class="column">
            <h4>Tarif Per Joki:</h4>
            <ul>
                <li><strong>Desain Database Kecil:</strong> Rp 30.000</li>
                <li><strong>Desain Database Menengah:</strong> Rp 50.000</li>
                <li><strong>Desain Database Besar:</strong> Rp 100.000 - Rp 150.000</li>
                <li><strong>Konsultasi:</strong> Rp 50.000/jam</li>
            </ul>
        </div>
    </div>
</div>

<div id="content-website" class="content hidden">
    <h3>Joki Website</h3>
    <p>Apakah Anda memerlukan bantuan untuk membuat atau mengembangkan website? Joki Website kami memiliki pengalaman dalam pengembangan website dan siap membantu Anda.</p>

    <div class="columns">
        <div class="column">
            <h4>Keuntungan Menggunakan Joki Website:</h4>
            <ul>
                <li>Desain website yang responsif</li>
                <li>Optimisasi SEO untuk peningkatan visibilitas</li>
                <li>Integrasi dengan platform media sosial</li>
                <li>Dukungan teknis setelah pengembangan</li>
                <li>Pengalaman dalam berbagai platform dan teknologi</li>
            </ul>
        </div>
        <div class="column">
            <h4>Tarif Per Joki:</h4>
            <ul>
                <li><strong>Website Sederhana:</strong> Rp 500.000</li>
                <li><strong>Website Menengah:</strong> Rp 1.500.000</li>
                <li><strong>Website Besar:</strong> Rp 3.000.000</li>
                <li><strong>Konsultasi:</strong> Rp 200.000/jam</li>
            </ul>
        </div>
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
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }

        // Tampilkan gambar yang sesuai
        slides[slideIndex].classList.add('active');

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

    function showContent(tab) {
        // Sembunyikan semua konten
        const contents = document.querySelectorAll('.content');
        contents.forEach(content => {
            content.classList.add('hidden');
        });

        // Tampilkan konten yang sesuai
        const activeContent = document.getElementById(`content-${tab}`);
        if (activeContent) {
            activeContent.classList.remove('hidden');
        }
    }

    // Menampilkan konten Joki Python secara default saat halaman dimuat
    showContent('python');
    showContent('database');
    showContent('microsoft');
    showContent('website');
</script>

</body>
</html>
