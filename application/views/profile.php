<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Dashboard</title>
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

        /* Tata letak utama dengan sidebar kanan */
        .dashboard-container {
            display: grid;
            grid-template-columns: 12fr; /* Sidebar tetap di sebelah kanan */
            height: 100vh;
        }

        /* Konten utama, posisi profil di bagian atas dan condong ke kiri */
        .main-content {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start; /* Posisi di atas */
            justify-content: flex-start; /* Konten condong ke kiri */
            flex-direction: row; /* Elemen-elemen diletakkan secara horizontal */
            gap: 20px; /* Beri jarak antar elemen */
        }

        /* Gaya untuk foto profil */
        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #333;
            cursor: pointer;
        }

        /* Gaya untuk bagian info pengguna */
        .profile-info {
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Teks juga di atas */
            align-items: flex-start; /* Menyelaraskan teks ke kiri */
        }

        .profile-info h1, .profile-info p {
            margin: 5px 0;
        }

        .profile-info h1 {
            font-size: 24px;
            color: #333;
        }

        /* Nama dan bio yang belum diisi */
        .profile-info .empty-field {
            font-size: 14px;
            opacity: 0.5; /* Sedikit transparan */
        }

        .profile-info p {
            font-size: 16px;
            color: #555;
        }

        /* Menu opsi untuk foto profil */
        .photo-options {
            display: none; /* Tersembunyi secara default */
            position: absolute;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10px;
            top: 120px; /* Sesuaikan dengan posisi foto profil */
            left: 20px;
            z-index: 100;
        }

        .photo-options button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background: none;
            text-align: left;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .photo-options button:hover {
            background-color: #f0f0f0;
        }

        /* Edit ikon di sebelah kanan */
        .edit-icon {
            cursor: pointer;
            margin-left: auto; /* Tempatkan ikon di ujung kanan */
        }

        /* Sidebar Kanan untuk User Info */
        .sidebar {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            height: 100%;
            position: relative;
        }

        .sidebar h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .sidebar .a-logout {
            display: inline-block;
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

        /* Responsif: untuk tampilan layar kecil */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr; /* Sidebar menyusut menjadi satu kolom */
            }
        }

        /* Gaya untuk modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            position: relative;
        }

        .modal-content h2 {
            margin-bottom: 20px;
        }

        .edit-options button, .edit-form button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        .edit-options button:hover, .edit-form button:hover {
            background-color: #0056b3;
        }

        .edit-form {
            display: none;
        }

        label {
            display: block;
            margin-top: 10px;
            font-size: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            font-size: 14px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <!-- Konten Kiri -->
    <div class="main-content">
        <!-- Foto profil yang dapat diubah -->
        <img src="path/to/default-profile.jpg" alt="Profile Picture" id="profilePicture" class="profile-picture">

        <!-- Menu opsi foto -->
        <div class="photo-options" id="photoOptions">
            <button onclick="choosePhoto()">Pilih Foto</button>
            <button onclick="removePhoto()">Hapus Foto</button>
            <button onclick="viewPhoto()">Lihat Foto</button>
        </div>

        <!-- Input file untuk mengganti foto profil -->
        <input type="file" id="fileInput" style="display:none;" accept="image/*">

        <!-- Informasi Profil -->
        <div class="profile-info">
            <h1 id="username"><?php echo $this->session->userdata('user')->username; ?></h1>
            <p id="fullName" class="empty-field">Nama Asli: Belum diisi</p>
            <p id="bio" class="empty-field">Bio: Belum diisi</p>
        </div>

        <!-- Ikon pengaturan -->
        <img src="<?php echo base_url('images/edit-icon.png'); ?>" alt="Edit" id="editIcon" class="edit-icon" width="30px">
    </div>

    <!-- Sidebar Kanan untuk User Info -->
    
</div>

<!-- Modal Edit Pilihan -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Profil</h2>
        <div class="edit-options">
            <button onclick="showEditInfo()">Edit Info</button>
            <button onclick="showEditSecurity()">Edit Keamanan</button>
        </div>
        
        <!-- Form Edit Info -->
        <div id="editInfoForm" class="edit-form">
            <h3>Edit Informasi</h3>
            <label for="fullNameInput">Nama Lengkap:</label>
            <input type="text" id="fullNameInput" placeholder="Nama Lengkap Baru">
            <label for="bioInput">Bio:</label>
            <textarea id="bioInput" placeholder="Bio Baru"></textarea>
            <button onclick="saveInfo()">Simpan Info</button>
        </div>

        <!-- Form Edit Keamanan -->
        <div id="editSecurityForm" class="edit-form" style="display: none;">
            <h3>Edit Keamanan</h3>
            <label for="usernameInput">Username:</label>
            <input type="text" id="usernameInput" placeholder="Username Baru">
            <label for="passwordInput">Password:</label>
            <input type="password" id="passwordInput" placeholder="Password Baru">
            <label for="phoneInput">Nomor Telepon:</label>
            <input type="text" id="phoneInput" placeholder="Nomor Telepon Baru">
            <button onclick="saveSecurity()">Simpan Keamanan</button>
        </div>
    </div>
</div>

<script>
    // Mendapatkan elemen modal dan form
    const editModal = document.getElementById('editModal');
    const editInfoForm = document.getElementById('editInfoForm');
    const editSecurityForm = document.getElementById('editSecurityForm');
    const editIcon = document.getElementById('editIcon');
    const closeModal = document.querySelector('.close');

    // Fungsi untuk menampilkan modal edit
    editIcon.addEventListener('click', function() {
        editModal.style.display = 'flex'; // Tampilkan modal
    });

    // Fungsi untuk menutup modal
    closeModal.addEventListener('click', function() {
        editModal.style.display = 'none';
        editInfoForm.style.display = 'none';
        editSecurityForm.style.display = 'none';
    });

    // Tampilkan form Edit Info
    function showEditInfo() {
        editInfoForm.style.display = 'block';
        editSecurityForm.style.display = 'none';
    }

    // Tampilkan form Edit Keamanan
    function showEditSecurity() {
        editSecurityForm.style.display = 'block';
        editInfoForm.style.display = 'none';
    }

    // Simpan informasi profil
    function saveInfo() {
        const fullName = document.getElementById('fullNameInput').value;
        const bio = document.getElementById('bioInput').value;

        // Update data pada elemen HTML (simulasi)
        document.getElementById('fullName').innerText = fullName ? `Nama Asli: ${fullName}` : 'Nama Asli: Belum diisi';
        document.getElementById('bio').innerText = bio ? `Bio: ${bio}` : 'Bio: Belum diisi';

        // Menutup modal
        editModal.style.display = 'none';
    }

    // Simpan data keamanan
    function saveSecurity() {
        const username = document.getElementById('usernameInput').value;
        const password = document.getElementById('passwordInput').value;
        const phone = document.getElementById('phoneInput').value;

        // Update username pada sidebar (simulasi)
        document.getElementById('username').innerText = username;

        // Logika untuk menyimpan password dan nomor telepon bisa ditambahkan di sini

        // Menutup modal
        editModal.style.display = 'none';
    }
</script>

</body>
</html>
