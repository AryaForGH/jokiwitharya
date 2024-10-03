<!-- footer.php -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
                <h1>Joki with Arya</h1>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <ul>
                    <li><a href="https://www.facebook.com/profile.php?id=100072018835823" target="_blank"><img src="<?php echo base_url('images/facebook-icon.png'); ?>" alt="Facebook"></a></li>
                    <li><a href="https://www.instagram.com/cliarym" target="_blank"><img src="<?php echo base_url('images/instagram-icon.png'); ?>" alt="Instagram"></a></li>
                    <li><a href="https://www.twitter.com/cliarym" target="_blank"><img src="<?php echo base_url('images/twitter-icon.png'); ?>" alt="Twitter"></a></li>
                    <li><a href="https://www.linkedin.com/in/cliarym" target="_blank"><img src="<?php echo base_url('images/linkedin-icon.png'); ?>" alt="LinkedIn"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Arya Ramadhan. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<style>
    /* Gaya untuk Footer */
    .footer {
        background-color: #333;
        color: white;
        padding: 20px 0;
        margin-top: 20px;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .footer-logo h1 {
        font-size: 24px;
        margin: 0;
    }

    .footer-links ul, .footer-social ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .footer-links li, .footer-social li {
        display: inline;
        margin: 0 10px;
    }

    .footer-links a {
        color: white;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-links a:hover {
        color: #1abc9c;
    }

    .footer-social img {
        width: 24px;
        height: 24px;
        transition: transform 0.3s;
    }

    .footer-social img:hover {
        transform: scale(1.1); /* Efek saat hover */
    }

    .footer-bottom {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .footer-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-links, .footer-social {
            margin-top: 10px;
        }

        .footer-links ul, .footer-social ul {
            flex-direction: column;
        }

        .footer-links li, .footer-social li {
            margin: 5px 0;
        }
    }
</style>
