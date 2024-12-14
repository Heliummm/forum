<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <!-- Menampilkan pesan error validasi -->
    <?php if (validation_errors()): ?>
        <div><?= validation_errors(); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('main/register'); ?>" method="post">
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?= set_value('name'); ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= set_value('email'); ?>" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="confirm_password">Konfirmasi Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <button type="submit">Daftar</button>
    </form>

    <p>Sudah punya akun? <a href="<?= base_url('main/login'); ?>">Login di sini</a></p>
</body>
</html>
