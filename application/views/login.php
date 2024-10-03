<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        input[type= "text"], input[type= "password"] {
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
        }

        button:hover {
            background-color: #218838;
        }

        .link-button {
            display: inline-block;
            padding: 10px;
            color: black;
            text-decoration: none;
            margin-top: 5px;
        }

        .link-button:hover {
            
            text-decoration: underline;
        }

        .p-header {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h2>Login</h2>
        </header>
        <?php echo form_open('user/login_user'); ?>
        <input type="text" name="username" placeholder="Username" required> <br>
        <input type="password" name="password" placeholder="Password" required> <br>
        
        <button type="submit">Login</button>
        <?php echo form_close(); ?>
        
        <?php if ($this->session->flashdata('message')); { ?>
            <p class="p-header"><?php echo $this->session->flashdata('message'); ?></p>
            
            <?php } ?>

            <a href="<?php echo site_url('user/register'); ?>" class="link-button">Register</a>
            <a href="<?php echo site_url('user/forgot_password'); ?>" class="link-button">Forgot Password</a>
        </div>
</body>
</html>