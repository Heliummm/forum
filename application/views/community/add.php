<div class="container">
    <h2>Tambah Komunitas</h2>
	<form action="<?= base_url('community/create'); ?>" method="post">
        <div class="form-group">
            <label>Nama Komunitas</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
