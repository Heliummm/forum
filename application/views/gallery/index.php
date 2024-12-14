<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Karya</title>
</head>
<body>
    <h2>Galeri Karya</h2>
    <a href="<?= base_url('main'); ?>">Kembali ke Beranda</a>
    <a href="<?= base_url('main/upload_artwork'); ?>">Unggah Karya Baru</a>
    <ul>
        <?php foreach ($artworks as $artwork): ?>
            <li>
                <h3><?= $artwork['title']; ?></h3>
                <p><?= $artwork['description']; ?></p>
                <img src="<?= base_url($artwork['file_path']); ?>" alt="<?= $artwork['title']; ?>" width="200">
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
