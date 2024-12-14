<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Diskusi</title>
</head>
<body>
    <h2>Forum Diskusi</h2>
    <a href="<?= base_url('main'); ?>">Kembali ke Beranda</a>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <a href="<?= base_url('main/forum/' . $category['id']); ?>"><?= $category['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
