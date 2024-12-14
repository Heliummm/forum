<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (isset($error)): ?>
            <div class="error-message"><?= $error; ?></div>
        <?php endif; ?>

        <!-- Form Login -->
        <form action="<?= base_url('main/login'); ?>" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= set_value('email'); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>

        <!-- Link ke halaman registrasi -->
        <p>Belum punya akun? <a href="<?= base_url('main/register'); ?>">Daftar di sini</a></p>
    </div>
</body>
</html>
