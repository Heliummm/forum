<div class="container">
    <h2>Edit Komunitas</h2>
    <?php echo form_open('main/edit_community/' . $community['id']); ?>
        <div class="form-group">
            <label>Nama Komunitas</label>
            <input type="text" name="name" class="form-control" value="<?php echo $community['name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required><?php echo $community['description']; ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?php echo form_close(); ?>
</div>
