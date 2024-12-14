<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Karya</title>
</head>
<body>
    <h2>Unggah Karya</h2>
    <a href="<?= base_url('main/gallery'); ?>">Kembali ke Galeri</a>
    <?php if (isset($error)): ?>
        <div><?= $error; ?></div>
    <?php endif; ?>
    <form action="<?= base_url('main/upload_artwork'); ?>" method="post" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="title" required>
        <label>Deskripsi:</label>
        <textarea name="description" required></textarea>
        <label>File Karya:</label>
        <input type="file" name="artwork_file" required>
        <button type="submit">Unggah</button>
    </form>
</body>
</html>
