<?php
session_start();

// Cek jika pengguna sudah login, redirect ke halaman portofolio jika sudah login
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: portfolio.php');
    exit;
}

// Cek jika form login dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simpan username dan password yang dikirimkan melalui form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tambahkan validasi login di sini sesuai dengan kebutuhan
    // Contoh sederhana untuk demonstrasi
    if ($username === 'admin' && $password === 'password') {
        // Jika login berhasil, set session loggedin menjadi true dan redirect ke halaman portofolio
        $_SESSION['loggedin'] = true;
        header('Location: portfolio.php');
        exit;
    } else {
        // Jika login gagal, tampilkan pesan error
        $error = 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .error {
            color: red;
            margin-bottom: 10px;
        }
        
        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>

        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
