<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas</title>
</head>
<body>
    <h2>Komunitas</h2>
    <a href="<?= base_url('main'); ?>">Kembali ke Beranda</a>
    <a href="<?= base_url('main/create_community'); ?>">Buat Komunitas Baru</a>
    <ul>
        <?php foreach ($communities as $community): ?>
            <li>
                <h3><?= $community['name']; ?></h3>
                <p><?= $community['description']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
