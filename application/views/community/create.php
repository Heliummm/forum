<h2>Create a New Community</h2>
<form id="create-community-form" method="post">
    <label for="name">Community Name:</label><br>
    <input type="text" name="name" id="name" required><br><br>

    <label for="description">Description:</label><br>
    <textarea name="description" id="description" required></textarea><br><br>

    <label for="category_id">Category:</label><br>
    <select name="category_id" id="category_id" required>
        <option value="">-- Select a Category --</option>
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Create Community</button>
</form>

<script>
    $(document).ready(function() {
        $('#create-community-form').submit(function(e) {
            e.preventDefault(); // Mencegah reload halaman

            var name = $('#name').val();
            var description = $('#description').val();
            var category_id = $('#category_id').val();

            $.ajax({
                url: '<?= base_url('community/create') ?>',
                type: 'POST',
                data: {
                    name: name,
                    description: description,
                    category_id: category_id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#community-list').append(
                            '<li><strong>' + response.community.name + '</strong><br>' +
                            response.community.description + '<br>' +
                            '<em>Category: ' + $('#category_id option:selected').text() + '</em></li>'
                        );

                        $('#name').val('');
                        $('#description').val('');
                        $('#category_id').val('');

                        alert('Community added successfully!');
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function() {
                    alert('Something went wrong. Please try again later.');
                }
            });
        });
    });
</script>
