<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama</title>
    <style>
        .body-dash-utama {
            font-family: Arial, sans-serif;
            background-color: #f4f44f;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container  {
            /* background-color: #fff; */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .h1-hu {
            font-family: Arial, sans-serif;
            text-align: center;
            /* margin-top: 8%; */
        }

        .h2-hu {
            font-size: 20px;
            font-family: Arial, sans-serif;
            text-align: center;
            /* margin-top: 10px; */
        }

        button {
            padding: 10px 20px;
            margin: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body class="body-dash-utama">
    <div class="container">
        <h1 class="h1-hu">Selamat Datang</h1>
        <p class="h2-hu">Silahkan Login / Daftar Untuk Melanjutkan</p>
        <button onclick="window.location.href = '<?php echo site_url('user/login'); ?>'" >Login</button>
    </div>
    
</body>

</html>