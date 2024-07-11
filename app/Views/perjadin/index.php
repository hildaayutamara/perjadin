<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Daftar Perjadin</h2>
    <a href="<?= site_url('perjadin/create') ?>" class="btn btn-primary mb-3">Tambah Perjadin</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nomor Surat Tugas</th>
                <th>DIPA</th>
                <th>Lokasi</th>
                <th>Dasar Hukum</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Temuan</th>
                <th>Rekomendasi</th>
                <th>Tindaklanjut</th>
                <th>Dampak</th>
                <th>Foto</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($perjadin as $row): ?>
            <tr>
                <td><?= $row['id_perjadin'] ?></td>
                <td><?= $row['nomor_surat_tugas'] ?></td>
                <td><?= $row['dipa'] ?></td>
                <td><?= $row['lokasi'] ?></td>
                <td><?= $row['dasar_hukum'] ?></td>
                <td><?= $row['tanggal_mulai'] ?></td>
                <td><?= $row['tanggal_selesai'] ?></td>
                <td><?= $row['temuan'] ?></td>
                <td><?= $row['rekomendasi'] ?></td>
                <td><?= $row['tindaklanjut'] ?></td>
                <td><?= $row['dampak'] ?></td>
                <td><img src="/uploads/<?= $row['foto'] ?>" width="100"></td>
                <td>
                    <a href="/perjadin/edit/<?= $row['id_perjadin'] ?>" class="btn btn-warning">Edit</a>
                    <form action="/perjadin/delete/<?= $row['id_perjadin'] ?>" method="post" style="display:inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>