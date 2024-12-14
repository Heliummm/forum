<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <nav>
    <a href="<?= base_url('profile'); ?>">Profil</a>
    <a href="<?= base_url('logout'); ?>">Logout</a>
    <a href="<?= base_url('auth/login'); ?>">Login</a>
    <a href="<?= base_url('main/register'); ?>">Register</a>
    </nav>
</head>
<body>
    <h2>Selamat Datang di Forum Kreativitas</h2>
    <?php if ($this->session->userdata('user_name')): ?>
        <p>Halo, <?= $this->session->userdata('user_name'); ?>!</p>
        <a href="<?= base_url('main/logout'); ?>">Logout</a>
    <?php else: ?>
    <?php endif; ?>
    <a href="<?= base_url('main/forum'); ?>">Forum Diskusi</a>
    <a href="<?= base_url('main/gallery'); ?>">Galeri Karya</a>
    <a href="<?= base_url('main/community'); ?>">Komunitas</a>
</body>
</html>
