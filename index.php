<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CODE WITH SOUMYA | Home</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo" style="font-weight: bold; color: #38bdf8;">CODE WITH SOUMYA</div>
        <div class="nav-links">
            <a href="about.html" style="color: #fff; text-decoration: none; margin-right: 20px;">About</a>
            <a href="contact.html" style="color: #fff; text-decoration: none; margin-right: 20px;">Contact</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="logout.php" style="color: #ef4444; text-decoration: none;">Logout</a>
            <?php else: ?>
                <a href="login.html" style="color: #38bdf8; text-decoration: none;">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="hero">
        <div class="glass">
            <h1 style="font-size: 3rem; margin-bottom: 10px;">Build Your Future</h1>
            <p style="color: #94a3b8; margin-bottom: 30px;">Professional Web Development & Cybersecurity Solutions</p>
            
            <div class="cta-container">
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a href="https://forms.gle/VvJSHnGdagbkK8ue6" target="_blank" class="cta-btn">
                        CREATE YOUR OWN WEBSITE NOW
                    </a>
                <?php else: ?>
                    <a href="javascript:void(0);" onclick="checkLogin();" class="cta-btn">
                        CREATE YOUR OWN WEBSITE NOW
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
    function checkLogin() {
        Swal.fire({
            title: 'Login Required!',
            text: 'Bhai, pehle login kar lo taaki hum aapka data save kar sakein.',
            icon: 'info',
            background: '#0d1117',
            color: '#fff',
            showCancelButton: true,
            confirmButtonText: 'Login Now',
            cancelButtonText: 'Later',
            confirmButtonColor: '#38bdf8',
            customClass: { popup: 'glass-popup' }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'login.html';
            }
        });
    }
    </script>
</body>
</html>