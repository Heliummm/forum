<div class="container">
    <h2>Daftar Komunitas</h2>
    <a href="<?php echo site_url('main/add_community'); ?>" class="btn btn-primary mb-3">Tambah Komunitas</a>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tanggal Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($communities as $community): ?>
                <tr>
                    <td><?php echo $community['name']; ?></td>
                    <td><?php echo $community['description']; ?></td>
                    <td><?php echo $community['created_at']; ?></td>
                    <td>
                        <a href="<?php echo site_url('main/edit_community/' . $community['community_id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?php echo site_url('main/delete_community/' . $community['community_id']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
