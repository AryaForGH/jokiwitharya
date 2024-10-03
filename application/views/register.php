<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        header {
            background-color: black;
            color: white;
            padding: 10px 0;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            margin: -20px -20px 20px -20px;
            text-align: center;
        }

        input[type= "text"], input[type= "password"], input[type= "email"], input[type= "tel"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #218838;
        }

        .link-button {
            display: inline-block;
            padding: 10px;
            color: black;
            text-decoration: none;
            margin-top: 10px;
        }

        .link-button:hover {
            
            text-decoration: underline;
        }

        .checkbox {
            margin: 10px 0;
            text-align: left;
            display: flex;
            align-items: center;
        }

        .checkbox input {
            margin-right: 10px;
        }

        .p-header {
            color: red;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <header>
                <h2>Register</h2>
            </header>
            <?php echo form_open('user/register_user'); ?>
            <input type="text" name="username" placeholder="Username" required> <br>
            <input type="email" name="email" placeholder="Email" required> <br>
            <input type="tel" name="phone" placeholder="No. Handphone" required> <br>
            <input type="password" name="password" placeholder="Password" required> <br>
            
            <div>
                <input type="checkbox" name="agreement" id="agreement" required>
                <label for="agreement" name="agreement">Saya menyetujui syarat dan ketentuan</label>
            </div>
            
            <button type="submit">Register</button>
            <?php echo form_close(); ?>
            
            <?php if ($this->session->flashdata('message')); { ?>
                <p class="p-header"><?php echo $this->session->flashdata('message'); ?></p>
                
                <?php } ?>

            <p>Sudah punya akun? <a href="<?php echo site_url('user/login'); ?>" class="link-button">Login</a></p>
    </div>

    <script>
        document.getElementById('registerForm').onsubmit = function() {
            var agreement = document.getElementById('agreement');
            if (!agreement.chechked) {
                alert('Anda harus menyetujui syarat dan ketentuan');
                return false;
            }
            return true
        }
    </script>

</body>
</html>