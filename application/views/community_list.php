<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community List</title>
</head>
<body>
    <h1>Community List</h1>
    <a href="<?= base_url('community/create') ?>">Create New Community</a>
    <ul>
        <?php foreach ($communities as $community) : ?>
            <li>
                <strong><?= htmlspecialchars($community['name']) ?></strong><br>
                <?= htmlspecialchars($community['description']) ?><br>
                <a href="<?= base_url('community/edit/' . $community['id']) ?>">Edit</a> |
                <a href="<?= base_url('community/delete/' . $community['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
