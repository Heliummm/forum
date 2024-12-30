<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Form</title>
</head>
<body>
    <h1><?= isset($community) ? 'Edit Community' : 'Create Community' ?></h1>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?= isset($community) ? htmlspecialchars($community['name']) : '' ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required><?= isset($community) ? htmlspecialchars($community['description']) : '' ?></textarea><br><br>

        <button type="submit"><?= isset($community) ? 'Update' : 'Create' ?></button>
    </form>
</body>
</html>
