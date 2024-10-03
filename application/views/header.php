<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header</title>
    <style>
        .body-header {
            background-color: #dddddd;
            margin: 0px;
            padding: 0px;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        section {
            width: 100%;
            height: 95vh;
            position: relative;
        }

        /* Styling untuk header / navbar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            background-color: #FFFFFF;
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2);
            padding: 0px 5%;
        }

        nav ul {
            display: flex;
        }

        nav ul li a {
            margin: 30px;
            font-family: myriad pro regular;
            color: #505050;
            font-size: 15px;
            font-weight: 700;
        }

        .logo {
            font-family: RoadTest;
            color: black;
            font-size: 22px;
            font-weight: bold;
        }

        .active {
            color: red;
            font-weight: bold;
        }

        /* Style untuk tombol hamburger */
        .menu-icon {
            display: none;
            font-size: 28px;
            cursor: pointer;
        }

        .a-link:hover {
            color: #1abc9c;
        }

        .a-logout:hover {
                color: red;
            }

        /* Style untuk tampilan layar kecil */
        @media (max-width: 768px) {
            nav ul {
                display: flex; /* Tetap gunakan flex agar menu bisa diatur dalam kolom */
                flex-direction: column;
                position: absolute;
                top: 60px; /* Sesuaikan dengan tinggi navbar */
                right: 0;
                background-color: white;
                width: 200px;
                height: 100vh;
                padding-top: 20px;
                box-shadow: -2px 0 10px rgba(0, 0, 0, 0.3);
                opacity: 0; /* Buat tidak terlihat saat pertama kali */
                transform: translateX(100%); /* Geser ke kanan (sembunyikan) */
                transition: transform 0.4s ease, opacity 0.4s ease; /* Tambahkan transisi */
            }

            /* Ketika menu aktif */
            nav ul.active {
                opacity: 1; /* Muncul dengan efek fade-in */
                transform: translateX(0); /* Kembali ke posisi semula (slide-in) */
            }

            nav ul li a {
                margin: 20px 0;
                text-align: right;
                padding: 10px;
                color: #505050;
                font-size: 18px;
                border-bottom: 1px solid #ddd;
                transition: color 0.3s ease; /* Tambahkan transisi warna */
            }

            nav ul li a:hover {
                color: #ff6347; /* Warna teks berubah saat di-hover */
            }

            /* Menampilkan tombol hamburger pada layar kecil */
            .menu-icon {
                display: block;
                color: #505050;
            }

            /* Style untuk membuat tombol hamburger lebih estetik */
            .menu-icon {
                font-size: 28px;
                cursor: pointer;
                transition: transform 0.3s ease;
            }

            /* Efek saat tombol di klik */
            .menu-icon.active {
                transform: rotate(90deg); /* Rotasi untuk efek animasi */
            }

            
        }


    </style>
</head>
<body class="body-header">
    <nav>
        <!-- Logo -->
        <a class="logo">Joki with Arya</a>

        <!-- Menu Icon (Hamburger) -->
        <span class="menu-icon" id="menu-icon">&#9776;</span>

        <!-- Navigasi -->
        <ul id="nav-menu">
            <li><a class="a-link" href="<?php echo base_url()?>index.php/user/dashboard">Home</a></li>
            <li><a class="a-link" href="<?php echo base_url()?>index.php/about">About</a></li>
            <li><a class="a-link" href="<?php echo base_url()?>index.php/service">Service</a></li>
            <li><a class="a-link" href="<?php echo base_url()?>index.php/profile">Profile</a></li>
            <li><a class="a-logout" href="<?php echo site_url('user/logout'); ?>">Logout</a></li>
        </ul>
    </nav>

    <script>
        // Ambil elemen menu-icon dan nav-menu
        const menuIcon = document.getElementById('menu-icon');
        const navMenu = document.getElementById('nav-menu');

        // Tambahkan event listener untuk toggle class 'active'
        menuIcon.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    </script>
</body>
</html>
